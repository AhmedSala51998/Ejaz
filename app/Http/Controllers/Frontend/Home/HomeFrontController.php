<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use App\Models\Contact;
use App\Models\FrequentlyQuestion;
use App\Models\Nationalitie;
use App\Models\OurService;
use App\Models\Slider;
use App\Models\Sponsor;
use App\Models\Statistic;
use Illuminate\Http\Request;

class HomeFrontController extends Controller
{

    public function index()
    {
        $sliders = Slider::latest()->take(4)->get();
        $ourServices = OurService::take(5)->get();
        $statistics = Statistic::latest()->take(4)->get();
        $sponsors = Sponsor::latest()->take(5)->get();
        $questions = FrequentlyQuestion::take(100)->get();
        $countries=Nationalitie::latest()->take(7)->get();
        $cvs = Biography::where('status','new')
            ->where('order_type','normal')
            ->with('recruitment_office','nationalitie','language_title',
            'religion','job','social_type','admin','images','skills')
            ->take(5)->get();
        return view('frontend.pages.home.home',[
            'sliders'=>$sliders,
            'ourServices'=>$ourServices,
            'statistics'=>$statistics,
            'sponsors'=>$sponsors,
            'questions'=>$questions,
            'cvs'=>$cvs,
            'countries'=>$countries,
        ]);
    }//end fun



    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     *
     * Save Contact us
     *
     */
    public function contact_us_action(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        Contact::create($data);
        return response()->json([],200);
    }//end fun


}//end class
