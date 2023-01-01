<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForgetPasswordFrontController extends Controller
{

    use MesgatSMS;

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
