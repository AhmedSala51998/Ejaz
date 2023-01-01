<?php

namespace App\Http\Controllers\Frontend\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomWorkerRequest;
use App\Models\Admin;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\City;
use App\Models\Job;
use App\Models\LanguageTitle;
use App\Models\Nationalitie;
use App\Models\Order;
use App\Models\Religion;
use App\Models\Setting;
use App\Models\SocialType;
use App\Models\User;
use App\Services\SMS\MesgatSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WorkerFrontController extends Controller
{

    use MesgatSMS;
    public function showAllWorkers(Request $request,$id=null)
    {

        $country=Nationalitie::find($id);
        $countr_id=$id;
        if($country) {

            $cvs = Biography::where('status', 'new')
                ->where('order_type', 'normal')
                ->FilterByAge($request->age)
                ->FilterByJob($request->job)
                ->FilterByNationality($country->id)->where('type','admission')
                ->with('recruitment_office', 'nationalitie', 'language_title',
                    'religion', 'job', 'social_type', 'admin', 'images', 'skills')
                ->latest()
                ->paginate(12);
            $countr_id=$id;
        }
        else{
            $cvs = Biography::where('status', 'new')
                ->where('order_type', 'normal')
                ->FilterByAge($request->age)
                ->FilterByJob($request->job)
                ->FilterByNationality($request->nationality)->where('type','admission')
                ->with('recruitment_office', 'nationalitie', 'language_title',
                    'religion', 'job', 'social_type', 'admin', 'images', 'skills')
                ->latest()
                ->paginate(12);
            $countr_id='';
        }
        $current_page = $cvs->currentPage() ;
        $last_page =  $cvs->lastPage();

        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page')
                ->with(['cvs' => $cvs])->render();
            return response()->json([
                'success' => true,
                'html' => $returnHTML,
                'current_page' => $current_page,
                'last_page' => $last_page,
            ]);
        }


        $ages = AgeRange::get();
        $jobs = Job::get();
        $nationalities = Nationalitie::get();




        return view('frontend.pages.all-workers.all-workers',[
            'ages'=>$ages,
            'jobs'=>$jobs,
            'nationalities'=>$nationalities,
            'cvs'=>$cvs,
            'current_page' => $current_page,
            'last_page' => $last_page,
            'country_id'=>$countr_id,
        ]);
    }//end fun



    public function completeTheRecruitmentRequest($id , Request $request)
    {
        $cv = Biography::findOrFail($id);
        if ($cv->status != 'new') {
            return response([], 400);
        }

        $order_data = [
            'user_id' => auth()->user()->id,
            'status' => "under_work",
            "admin_id" => $request->customerSupport,
            'order_date' => now()
        ];

        $this->sendSMS( auth()->user()->phone, 'لقد قمت بطلب استقدام جديد ');
        $msg =   " عزيزى الموظف " . " قام العميل " . auth()->user()->name . " رقم جواله " . auth()->user()->phone . " \nبحجز السيرة الذاتية الاتية " . $cv->name;
        $admin=Admin::find($request->customerSupport);

        if(!empty($admin->phone)) {
            $this->sendSMS($admin->phone, $msg);
        }
        Biography::where('id', $id)->update($order_data);
        $order_data['biography_id'] = $cv->id;
        $order_data['order_code'] = "NK" . $cv->id . time();
        Order::create($order_data);
        return response([], 200);
    }//end fun


    public function show_worker_details($id)
    {
        $cv = Biography::with('recruitment_office','nationalitie','language_title',
            'religion','job','social_type','admin','images','skills')
            ->where('id',$id)
            ->firstOrFail();
        $admins = \App\Models\Admin::where('admin_type','!=',0)->take(3)->get();
        $returnHTML = view("frontend.pages.all-workers.worker.worker_details")
            ->with(['cv'=>$cv,'admins'=>$admins])
            ->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }//end fun



    public function custom_worker_request_view()
    {
        $nationalities = Nationalitie::get();
        $jobs = Job::get();
        $ages = AgeRange::get();
        $social_types = SocialType::get();
        $religions = Religion::get();
        $languages = LanguageTitle::get();
        $cities = City::get();

        return view('frontend.pages.recruitment-request.recruitment-request',[
            'nationalities'=>$nationalities,
            'jobs'=>$jobs,
            'ages'=>$ages,
            'social_types'=>$social_types,
            'religions'=>$religions,
            'languages'=>$languages,
            'cities'=>$cities,
        ]);
    }

    public function makeCustomRecruitmentRequest(CustomWorkerRequest $request)
    {

        $user = User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'city_id'=>$request->city_id,
            'type'=>'employer',
        ]);

        Biography::create([
            'user_id'=>$user->id,
            'status'=>"under_work",
            'order_type'=>"special",
            'visa_number'=>$request->visa_number,
            'nationalitie_id'=>$request->nationalitie_id,
            'job_id'=>$request->job_id,
            'order_of_age_id'=>$request->order_of_age_id,
            'social_type_id'=>$request->social_type_id,
            'religion_id'=>$request->religion_id,
            'language_title_id'=>$request->language_title_id,
            'type_of_experience'=>$request->type_of_experience,
            'special_requirement'=>$request->special_requirement,
            'order_date'=>now(),
        ]);

        return response()->json([],200);
    }//end fun

    public function show($id){


        $cv = Biography::with('recruitment_office','nationalitie','language_title',
            'religion','job','social_type','admin','images','skills')
            ->where('id',$id)
            ->firstOrFail();
        $admins = \App\Models\Admin::where('admin_type','!=',0)->take(3)->get();
       return view("frontend.pages.all-workers.worker.worker_details",compact('cv','admins'));

    }


//    private function sendSms($phone,$msg){
//        $phone='966'.$phone;
//
//
//
//        $ch = curl_init(config('msegat.msegat_url'));
//        $data = array(
//            'userName'=>config('msegat.userName'),
//            'apiKey' => config('msegat.apiKey'),
//            'numbers' => $phone,
//            'userSender' => config('msegat.userSender'),
//            'msgEncoding' => config('msegat.msgEncoding'),
//            'msg' => $msg
//        );
//
//
//        $result = Http::withOptions([
//            'verify' => false,
//        ])->post(config('msegat.msegat_url'),$data);
//
//
////        curl_setopt($ch, CURLOPT_POST, 1);
////        //Attach our encoded JSON string to the POST fields.
////        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
////        //Set the content type to application/json
////        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
////        //Execute the request
////        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
////
////        $result = curl_exec($ch);
//        return $result;
//    }






}//end class
