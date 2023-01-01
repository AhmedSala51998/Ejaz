<?php

namespace App\Http\Controllers\Frontend\TransferServices;

use App\Http\Controllers\Controller;
use App\Models\AgeRange;
use App\Models\Biography;
use App\Models\Job;
use App\Models\Nationalitie;
use Illuminate\Http\Request;

class TransferServicesFrontController extends Controller
{

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
        $current_page = $cvs->currentPage() ;
        $last_page =  $cvs->lastPage();


        if ($request->ajax()) {
            $returnHTML = view('frontend.pages.all-workers.worker.workers_page',['transfer'=>'transfer'])
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
            'transfer'=>'transfer',
        ]);
    }
}
