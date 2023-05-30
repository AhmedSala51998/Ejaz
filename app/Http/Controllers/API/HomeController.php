<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrdersCollection;
use App\Http\Resources\WorkersCollection;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Nationalitie;
use App\Models\Order;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use MesgatSMS;
    public function getRequestInfo(Request $request)
    {
        $nationalities = Nationalitie::get()->pluck('id','title');

        $admins = \App\Models\Admin::where('admin_type','!=',0)->pluck('whats_up_number','name');
//        $admins_array=[];
//        foreach ($admins as $key=>$val){
//            $admins_array[$val->id]['name']=$val->name;
//            $admins_array[$val->id]['']=$val->name;
//
//        }

        return response()->json([
            'success' => true,
            'nationalities' => $nationalities,
            'admins' => $admins,
        ]);
    }

    public function workers(Request $request)
    {

        $cvs = Biography::where('status', 'new')
            ->where('order_type', 'normal')
            ->FilterByAge($request->age)
            ->FilterByJob($request->job)
            ->FilterByNationality($request->nationality)->where('type','admission')
            ->with('recruitment_office', 'nationalitie', 'language_title',
                'religion', 'job', 'social_type', 'admin', 'images', 'skills')
            ->latest()

            ->paginate(3);


        return new WorkersCollection($cvs);


    }
    public function transferService(Request $request){
        $cvs = Biography::where('status','new')
            ->where('order_type','normal')
            ->FilterByAge($request->age)
            ->FilterByJob($request->job)
            ->FilterByNationality($request->nationality)->where('type','transport')
            ->with('recruitment_office','nationalitie','language_title',
                'religion','job','social_type','admin','images','skills')->where('type','transport')
            ->latest()
            ->paginate(3);
        return new WorkersCollection($cvs);
    }
    public function send_code(Request $request)
    {
        if($request->user_phone) {
//            ALTER TABLE `users` ADD `check_phone_api` VARCHAR(256) NULL AFTER `phone_code`;
          $phone=  str_replace("+966", '', $request->phone);

        $check_user = User::where('phone', $phone)->find();
        if (!empty($check_user)){
            if (env('SMS_Work') == 'work') {
                $code = rand(1111, 9999);
                $this->sendSMS($request->phone, "كود التحقق هو $code");

                 $code;
            }
            $code="1234";
            $check_user->check_phone_api=$code;
            $check_user->save();
            return response()->json(['success' => true,"code"=>$code],200);

        }else{
            return response()->json(['success' => false, 'msg' => 'عزيزي العميل رقم الجوال المرسل غير موجد لدينا في الموقع الالكتروني يمكننا مساعدتكم من خلال الاتي '], 400);

        }}

    }
    public function verify_code(Request $request)
    {
        if($request->phone) {
//            ALTER TABLE `users` ADD `check_phone_api` VARCHAR(256) NULL AFTER `phone_code`;
            $phone=  str_replace("+966", '', $request->phone);
            $check_user = User::where('phone', $phone)->where('check_phone_api',$request->code)->find();
            if ($check_user->check_phone_api == $request->code ){
                $ordersHistory = Order::where(['user_id'=>$check_user->id])
                    ->whereIn('status',['under_work','visa','traning','musaned','contract','finished','canceled'])
                    ->whereHas('admin', function ($q) {
                        $q->where('id','!=',null);
                    })
                    ->whereHas('biography', function ($q) {
                        $q->where('id','!=',null);
                    })->with('admin','biography','biography.recruitment_office','biography.nationalitie',
                        'biography.language_title',
                        'biography.religion','biography.job',
                        'biography.social_type','biography.images','biography.skills')
                    ->latest()
                    ->get();
                return new OrdersCollection($ordersHistory);
            }else{
                return response()->json(['success' => false, 'msg' => 'عزيزي العميل رقم التحقق غير صحيح  يمكننا مساعدتكم من خلال الاتي '], 400);

            }}

    }


    public function contact_us_action(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        Contact::create($data);
        return response()->json([  'success' => true],200);
    }//end fun


    public function getClientOrders(Request $request)
    {

        if($request->user_phone) {
            $user = User::where('phone', $request->user_phone)->first();

            if (!empty($user)) {
                $currentOrders = Order::where([
                    'user_id' => $user->id,

                ])->whereHas('admin', function ($q) {
                    $q->where('id', '!=', null);
                })
                    ->whereHas('biography', function ($q) {
                        $q->where('id', '!=', null);
                    })
                    ->with('admin', 'biography', 'biography.recruitment_office', 'biography.nationalitie',
                        'biography.language_title',
                        'biography.religion', 'biography.job',
                        'biography.social_type', 'biography.images', 'biography.skills')
                    ->latest()
                    ->get();
                return new OrdersCollection($currentOrders);


            } else {
                return response()->json(['success' => false, 'msg' => 'هذا الرقم غير مسجل فى سجلتنا'], 400);

            }
        }else{
            return response()->json(['success' => false, 'msg' => 'برجاء ارسل رقمك المسجل لدينا'], 400);

        }
    }//end fun

    public function forget_password_view()
    {
        if (auth()->check()) {
            toastError(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.forgetPassword.forgetPassword');
    }//end fun



    public function forget_password_action(Request $request)
    {
        $user = User::where('phone',$request->phone)->first();
        if (!$user) {
            return response()->json([],400);
        }
        $user = $this->make_token_for_confirm_phone($user);
        //send reset password
        $this->sent_link_of_reset_password($user);
        return response()->json(["user"=>$user],200);
    }



    public function forget_password_email_successfully_sent()
    {
        if (auth()->check()) {
            toastError(__('frontend.errorMessageAuth'),__('frontend.errorTitleAuth'));
            return redirect()->back();
        }
        return view('frontend.pages.auth.forgetPassword.forget-password-link-sent-successfully');
    }

    private function make_token_for_confirm_phone($user)
    {
        $user->token = md5($user->id.time());
        $user->confirm_link_expire = Carbon::parse(date("d-m-Y H:i:s"))->addHour();
        $user->save();
        return $user;
    }


    private function sent_link_of_reset_password($user)
    {
        $url = route('auth.reset_password_view')."?token=".$user->token;
        $msg = "يمكنك إعادة تعيين كلمة المرور من خلال هذا الرابط : $url ";
        if (env('SMS_Work')== 'work') {
            $this->sendSMS($user->phone, $msg);
        }
    }
}//end class
