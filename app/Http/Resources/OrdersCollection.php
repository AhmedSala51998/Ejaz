<?php

namespace App\Http\Resources;

use App\Models\ReservationStatus;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($data) {
                if ($data->status == "canceled")
                 $status= __('frontend.orderCanceled');
                elseif ($data->status == "under_work")
                    $status='تم حجز السيرة الذاتيه ';
                elseif ($data->status == "visa")
                 $status= 'اصبح التعاقد الخاص بكم  فى مرحلة التفييز بنجاح ';
                elseif ($data->status == "musaned")
               $status= 'تم ربط العقد الخاص بكم في مساند بنجاح  ';

                elseif ($data->status == "traning")
                $status='اصبح التعاقد الخاص بكم فى مرحلة الاجراءات بنجاح ';

                elseif ($data->status == "contract")
               $status= ' تم قبول التعاقد الخاص بكم ';

                elseif($data->status == "finished")
               $status= __('frontend.orderDone');

                return [
                    'id' => $data->id,
                    'images' =>get_file($data->biography->cv_file),
                     'status'=>$status,
                    'nationality'=>$data->biography->nationalitie?$data->biography->nationalitie->title:"",
                    'occupation'=>$data->biography->job?$data->biography->job->title:"",
                    'arrived_at'=>(isset($data->arrived_at))? ((isset($data->arrived_at)) ?date('d-m-Y h:i a', strtotime($data->arrived_at)):"غير محدد"):"غير محدد",
                   'adminstaff' =>$data->admin->name,
                    'adminstaff_user' =>!empty($data->Adminstaff)?$data->Adminstaff:"",
                    'admin_whats_link'=>'https://api.whatsapp.com/send?phone='.$data->admin->whats_up_number ,
                    'phone'=>$data->admin->phone,


                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
