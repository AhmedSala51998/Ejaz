<?php

namespace App\Http\Controllers\Frontend\Cvs;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use Illuminate\Http\Request;

class CvDesignController extends Controller
{
    //
    public function index($id){
       $cv= Biography::find($id);
        return view('frontend.pages.cvDesign.index',compact('cv'));

    }
}
