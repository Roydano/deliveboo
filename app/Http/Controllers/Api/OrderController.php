<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway){

        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token
        ];

        return response()->json([
            'success' => true,
            'results' => $data

        ]);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway){
        
        $result = $gateway->transaction()->sale([
            'amount' => '12.00',
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if($result->success){
            $data = [
                'success' => true,
                'message' => "Transazione effettuata con Successo!"
            ];
            return response()->json($data, 200);
        } else{
            $data = [
                'success' => false,
                'message' => "Transazione fallita!"
            ];
            return response()->json($data, 401);
        }
    }
}
