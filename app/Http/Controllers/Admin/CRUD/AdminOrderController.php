<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\BiographyImage;
use App\Models\BiographySkill;
use App\Models\Job;
use App\Models\LanguageTitle;
use App\Models\Nationalitie;
use App\Models\Order;
use App\Models\RecruitmentOffice;
use App\Models\Religion;
use App\Models\Biography;
use App\Models\Skill;
use App\Models\SocialType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;
use App\Models\Language;

class AdminOrderController extends Controller
{

    use Upload_Files;

    // use CheckPermission;


    public function __construct()
    {
        /* $this->middleware([('permission:siteTexts index,admin')])->only(['index']);*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*


     */
    public function index(Request $request)
    {
        if (!checkPermission(31))
            return view('admin.permission');

           $admin=  \App\Models\Admin::find(admin()->id());
           $roles= $admin->roles;
           $count=0;
           foreach ($roles as $role)
           {
              if($role->id==1){
                  ++$count;
              }
           }



        if ($request->ajax()) {

            if(admin()->user()->admin_type == 0){
                if ($count>0)
                {
                    $dataTables = Order::query()->orderBy("id", "DESC");

                }
                else
                {
                    $dataTables = Order::query()->where('admin_id',$admin->id)->orderBy("id", "DESC");

                }
            }else{

                if ($count>0) {
                    $dataTables = Order::query()->where("admin_id",)->orderBy("id", "DESC");

                }
                else {
                    $dataTables = Order::query()->where('admin_id',$admin->id)->orderBy("id", "DESC");

                }


            }
            return DataTables::of($dataTables)
                ->editColumn('image', function ($row) {
                    $cv = (isset($row->biography->cv_file))? $row->biography->cv_file:"";
                    return ' <img src="'.get_file($cv).'" class="rounded" style="height:60px;width:60px;object-fit: contain;"
                             onclick="window.open(this.src)">';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == "new") {
                        return "غير محجوز";
                    } elseif ($row->status == "under_work") {
                        return "جارة التعاقد ";
                    } elseif ($row->status == "finished") {
                        return "تم التعاقد ";
                    } else {
                        return "ملغى";
                    }

                })
                ->addColumn('nationalitie_id', function ($row) {
                    return (isset($row->biography->nationalitie->title)) ? $row->biography->nationalitie->title : "غير محدد ";
                })
                ->addColumn('passport_number', function ($row) {
                    return (isset($row->biography->passport_number)) ? $row->biography->passport_number : "غير محدد ";
                })
                ->addColumn('biography_number', function ($row) {
                    return (isset($row->biography->biography_number)) ? $row->biography->biography_number : "غير محدد ";
                })
                ->addColumn('user', function ($row) {
                    return (isset($row->user->name)) ? $row->user->name : "غير محدد ";
                })
                ->addColumn('admin', function ($row) {
                    return (isset($row->admin->name)) ? $row->admin->name : "غير محدد ";
                })
                ->addColumn('actions', function ($row) {
                    $compelete = '';
                    $delete = '';
                    if (!checkPermission(32))
                        $compelete = 'hidden';
                    if (!checkPermission(33))
                        $delete = 'hidden';
                    if ($row->status == "new" || $row->status == "under_work") {
                        $text = "إتمام التعاقد";
                        return "
                    <a href='#'  ".$compelete."  class='btn btn-info update-status' id='" . $row->id . "'> ".$text."  </a>
                   <a " .$delete."  style='margin-right: 10px;' href='#' class='btn btn-danger  delete mr-2' id='" . $row->id . "'><i class='fa fa-trash'></i> </a>";
                    } elseif ($row->status == "finished") {
                        return "<a style='margin-right: 10px;' href='#' class='btn btn-danger mr-2' id=''> لا يوجد اجراء </a>";
                    } else {
                        return "<a style='margin-right: 10px;' href='#' class='btn btn-danger mr-2' id=''> لا يوجد اجراء </a>";
                    }
                })
                ->rawColumns(['image', 'created_at', 'status', 'nationalitie_id', 'passport_number',
                    'biography_number', 'user', 'admin', 'actions'
                ])->make(true);
        }
        return view('admin.crud.order.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }//end fun

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::where("id", $id)->first();
        Order::where("id", $id)->update(["status" => "finished"]);
        Biography::where("id", $order->biography_id)->update(["status" => "finished"]);
        $biograpy=Biography::find($order->biography_id);
        $phone=$order->user->phone;
         $country=substr($biograpy->nationalitie->title??'', 0, 5);
         $admin=$order->admin->name??'';
        $msg="عزيزي العميل تم إتمام التعاقد الخاص بك برقم حجز
( $biograpy->passport_number .$country  )
الرجاء المتابعه مع
( $admin )";

        $this->sendSms($phone,$msg);
        return response()->json("ok", 200);
    }//end fun



    private function sendSms($phone,$msg){
        $phone='966'.$phone;



        $ch = curl_init(config('msegat.msegat_url'));
        $data = array(
            'userName'=>config('msegat.userName'),
            'apiKey' => config('msegat.apiKey'),
            'numbers' => $phone,
            'userSender' => config('msegat.userSender'),
            'msgEncoding' => config('msegat.msgEncoding'),
            'msg' => $msg
        );


        $result = Http::withOptions([
            'verify' => false,
        ])->post(config('msegat.msegat_url'),$data);


//        curl_setopt($ch, CURLOPT_POST, 1);
//        //Attach our encoded JSON string to the POST fields.
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $response_data);
//        //Set the content type to application/json
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//        //Execute the request
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//        $result = curl_exec($ch);
        return $result;
    }



    public function destroy($id)
    {
        $order = Order::where("id", $id)->first();
        Order::where("id", $id)->update(["status" => "canceled"]);
        Biography::where("id", $order->biography_id)->update(["status" => "new", "admin_id" => null, "user_id" => null]);
        return response()->json("ok", 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {

    }


}//end
