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

    /*public function detectLocation(Request $request)
    {
        // Default city
        $defaultCity = 'riyadh';

        // جلب الـ IP من المستخدم
        $userIp = $request->ip();
        //$userIp = '102.123.45.67';
        //$userIp = '31.166.218.125';

        // هنا ممكن تستخدم خدمة GeoIP
        $city = $this->getCityFromIp($userIp);
        return $city;

        // تحقق إذا المدينة ضمن المدن المعتمدة
        $allowedBranches = ['yanbu', 'riyadh', 'jeddah'];
        if (!in_array(strtolower($city), $allowedBranches)) {
            $city = $defaultCity;
        }

        // حفظ المدينة في session
        session(['branch' => $city]);

        // اعمل redirect للرابط المناسب
        return redirect()->route('branch.home', ['branch' => $city]);
    }

    private function getCityFromIp($ip)
    {
        // هنا ممكن تستخدم حزمة GeoIP (مثل torann/geoip)
        // مثال:
        try {
            $location = geoip($ip); // returns array with 'city', 'country', etc
            return $location['city'] ?? 'riyadh';
        } catch (\Exception $e) {
            return 'riyadh';
        }
    }*/

    // صفحة الكروت / landing
    public function showLanding()
    {
        return view('frontend.pages.home.parts.landing');
    }

    // استلام الإحداثيات من الجافاسكريبت
    // استلام الإحداثيات أو استخدام IP fallback
    public function detectCityAjax(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;

        // لو لم يرسل المستخدم الإحداثيات → استخدم IP-based location
        if (!$lat || !$lng) {
            $ip = $request->ip();
            try {
                $location = geoip($ip); // تأكد من استخدام Torann/GeoIP أو أي مكتبة GeoIP
                $lat = $location->lat;
                $lng = $location->lon;
            } catch (\Exception $e) {
                // لو فشل تحديد الموقع من IP، ضع قيم تقريبية بالرياض
                $lat = 24.7136;
                $lng = 46.6753;
            }
        }

        // إحداثيات المدن الثلاثة
        $cities = [
            'jeddah' => ['lat'=>21.4858, 'lng'=>39.1925],
            'yanbu'  => ['lat'=>24.0890, 'lng'=>38.0617],
            'riyadh' => ['lat'=>24.7136, 'lng'=>46.6753],
        ];

        $closestCity = null;
        $minDistance = INF;

        foreach ($cities as $city => $coords) {
            $dist = $this->getDistance($lat, $lng, $coords['lat'], $coords['lng']);
            if ($dist < $minDistance) {
                $minDistance = $dist;
                $closestCity = $city;
            }
        }

        // **لن نضع default هنا**، حتى لو بعيد جداً
        session(['branch' => $closestCity]);

        return response()->json([
            'redirect' => route('branch.home', ['branch' => $closestCity])
        ]);
    }

    // دالة لحساب المسافة Haversine
    private function getDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // نصف القطر بالكيلومتر
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat/2) * sin($dLat/2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon/2) * sin($dLon/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $R * $c;
    }



    /*public function index()
    {
        $sliders = Slider::latest()->take(4)->get();
        $ourServices = OurService::take(5)->get();
        $statistics = Statistic::latest()->take(4)->get();
        $sponsors = Sponsor::latest()->take(5)->get();
        $questions = FrequentlyQuestion::take(100)->get();
        $countries=Nationalitie::latest()->get();
        $admins = \App\Models\Admin::where('admin_type','!=',0)->get();

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
            'admins'=>$admins
        ]);
    }*///end fun

    public function index(Request $request , $branch)
    {

        $sliders     = Slider::latest()->take(4)->get();
        $ourServices = OurService::take(5)->get();
        $statistics  = Statistic::latest()->take(4)->get();
        $sponsors    = Sponsor::latest()->take(5)->get();
        $questions   = FrequentlyQuestion::take(100)->get();
        $countries   = Nationalitie::latest()->get();

        $cvs = Biography::where('status','new')
            ->where('order_type','normal')
            ->with(
                'recruitment_office',
                'nationalitie',
                'language_title',
                'religion',
                'job',
                'social_type',
                'admin',
                'images',
                'skills'
            )
            ->take(5)
            ->get();
            session(['branch' => $branch]);

            /*$branch = $request->segment(1);

            if (!in_array($branch, ['yanbu','riyadh','jeddah'])) {
                //$branch = 'riyadh';
            }*/

            $admins = \App\Models\Admin::where('admin_type','!=',0)
                        ->where('branch', $branch)
                        ->get();


        return view('frontend.pages.home.home', [
            'sliders'=>$sliders,
            'ourServices'=>$ourServices,
            'statistics'=>$statistics,
            'sponsors'=>$sponsors,
            'questions'=>$questions,
            'cvs'=>$cvs,
            'countries'=>$countries,
            'admins'=>$admins,
            'branch'      => $branch,
        ]);
    }


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
