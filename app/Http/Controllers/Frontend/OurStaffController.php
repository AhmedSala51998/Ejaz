<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Nationalitie;
use App\Models\OurService;
use Illuminate\Http\Request;

class OurStaffController extends Controller
{
    public function index()
    {
        $admins = \App\Models\Admin::where('admin_type','!=',0)->get();

        return view('frontend.pages.ourStaff.ourStaff',['admins'=>$admins]);
    }//end fun



}
