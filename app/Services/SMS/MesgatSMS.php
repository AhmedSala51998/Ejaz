<?php

namespace App\Services\SMS;

use Illuminate\Support\Facades\Http;

trait MesgatSMS
{

    function sendSMS($phone,$msg)
    {
        if (substr($phone, 0, 2) == '05')
        {
           $phone = ltrim($phone,'0');
        }elseif(substr($phone, 0, 4) == '9660')
        {
            $phone = ltrim($phone,'9660');
        }
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


}
