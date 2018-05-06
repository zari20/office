<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZarinPal;

class ZarinPalController extends Controller
{
    private static $merchantID = '6745eb22-4e94-11e8-9b08-005056a205be';

    public static function direct($amount,$description,$type)
    {
        //initial data
        $initial_data = $data = [
            'MerchantID' => self::$merchantID, //required
            'Amount' => $amount, //required - toman
            'CallbackURL' => "http://iqoffice.ir/zarinpal/callback/{$type}", //required
            'Description' => $description
        ];

        //library codes
        $jsonData = json_encode($data);
        $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true);
        curl_close($ch);

        //store zarinpal in database
        ZarinPal::make($initial_data,$result,$type);

        //redirections and results
        if ($err) {
            return view('partials.whoops',[ 'message' => "ارور : $err" ]);
        } else {
            if ($result["Status"] == 100) {
                return redirect('https://www.zarinpal.com/pg/StartPay/' . $result["Authority"]);
            } else {
                return view('partials.whoops',[ 'message' => "ارور : ".$result["Status"] ]);
            }
        }

    }

    public function authority($type)
    {
        //initial data
        $authority = $_GET['Authority'];
        $zarin = ZarinPal::where('aid',$authority)->first(); if(!$zarin) return view('partials.whoops');
        $data = ['MerchantID' => $zarin->mid, 'Authority' => $authority, 'Amount' => $zarin->amount];

        //library codes
        $jsonData = json_encode($data);
        $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);

        //redirections and results
        if ($err) {
            return view('partials.whoops',[ 'message' => "ارور : $err" ]);
        } else {
            if ($result['Status'] == 100) {
                $zarin->rid = $result['RefID'];
                $zarin->save();
                self::finish($type,$zarin->id);
            } else {
                return view('partials.whoops',[ 'message' => "ارور : ".$result["Status"] ]);
            }
        }
    }

    public static function finish($type,$zid)
    {
        if ($type=='reserve') {
            ReserveController::successful_transaction($zid);
        }
    }
}
