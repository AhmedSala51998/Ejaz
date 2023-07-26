<?php

namespace App\Http\Controllers\Frontend\Cvs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CvDesignController extends Controller
{
    //
    public function index(){
        return view('frontend.pages.cvDesign.index');

    }
}
