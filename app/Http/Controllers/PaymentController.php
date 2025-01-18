<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function handlePaymentResponse(Request $request)
    {
        error_reporting(0);

        $workingKey = ''; // Working Key should be provided here.
        $encResponse = $request->input('encResp'); // This is the response sent by the CCAvenue Server
        $rcvdString = Crypto::decrypt($encResponse, $workingKey); // Crypto Decryption used as per the specified working key.
        $order_status = "";
        $decryptValues = explode('&', $rcvdString);
        $dataSize = sizeof($decryptValues);

        $response = [];

        for ($i = 0; $i < $dataSize; $i++) {
            $information = explode('=', $decryptValues[$i]);
            if ($i == 3) {
                $order_status = $information[1];
            }
            $response[$information[0]] = urldecode($information[1]);
        }

        return view('payment.response', compact('order_status', 'response'));
    }
}

