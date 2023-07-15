<?php

namespace App\Http\Controllers\Admin\CRUD;

use App\Http\Traits\Upload_Files;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Experience;
use App\Models\Notes;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class AdminNotesController extends Controller
{



    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$order_id)
    {
        if (!checkPermission(10))
            return view('admin.permission');

        if ($request->ajax()) {
            $dataTables = Notes::query()->where('order_id',$order_id)->latest();

            return DataTables::of($dataTables)
                /* ->editColumn('desc', function ($row) {
                     return $row->desc;
                 })*/
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })
                ->editColumn('note', function ($row) {
                    return $row->note;
                })
                ->addColumn('delete_all', function ($row) {
                    return "<input type='checkbox' class=' delete-all form-check-input' data-tablesaw-checkall name='delete_all' id='" . $row->id . "'>";
                })
                ->addColumn('actions', function ($row) {
                    $edit = '';
                    $delete = '';
                    if (!checkPermission(12))
                        $edit = 'hidden';
                    if (!checkPermission(13))
                        $delete = 'hidden';

                    return "
                   <button "  .$delete. " class='btn btn-danger  delete' id='" . $row->id . "'><i class='fa fa-trash'></i> </button>";
                })
                ->rawColumns(['actions',/* 'desc',*/ 'delete_all', 'title'])->make(true);
        }
        return view('admin.crud.note.index',compact('order_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $returnHTML = view("admin.crud.note.parts.add_form")->with([
                'languages' => Language::where('is_active', 'active')->get(),
            ])->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {

        $data = $this->validate($request, [
            /* 'image'=>'nullable|file|image',*/
            'note' => 'required',
            'id' => 'required',
            /* 'desc'=>'required|array',
             'desc.*'=>'required',*/
        ]);
        $data['note'] = $request->note;
        $data['order_id'] = $id;
        /*  $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),null );*/
        Notes::create($data);
        $params=array(
            'token' => '4swdwztymusjggiv',
            'to' => '+201278295433',
            'body' => $request->note
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance54417/messages/chat'",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($params),
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
        return response()->json(1, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $returnHTML = view("admin.crud.note.parts.edit_form")
                ->with([
                    'obj' => Experience::findOrFail($id)
                ])
                ->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
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
        $slider = Notes::findOrFail($id);
        $data = $this->validate($request, [
            /* 'image'=>'nullable|file|image',*/
            'note' => 'required',
            'order_id' => 'required',
            /* 'desc'=>'required|array',
             'desc.*'=>'required',*/
        ]);
        try {
            /*if ($request->hasFile('image')){
                $data ['image'] = $this->uploadFiles('our_services',$request->file('image'),$slider->image );
            }else{
                $data ['image'] = $slider->image;
            }*/
            $name = [];
            /* $desc = [];*/

            $data['name'] = $request->name;
            $data['order_id'] = $request->order_id;

            /*  $data['desc'] = $desc;*/
            $slider->update($data);
            return response()->json(1, 200);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json(Notes::destroy($id), 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function delete_all(Request $request)
    {
        Notes::destroy($request->id);
        return response()->json(1, 200);
    }


}//end
