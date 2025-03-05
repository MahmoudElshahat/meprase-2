<?php

namespace Botble\Ecommerce\Http\Controllers\Fronts;

use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Ecommerce\Facades\ProductCategoryHelper;
use Botble\Ecommerce\Http\Controllers\BaseController;
use Botble\Ecommerce\Services\Products\GetProductService;
use Botble\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PaymentController extends BaseController
{       

    public $createRequest;
    public function __construct(GetProductService $getProductService){

        $publicKey ='b87c4733-d581-40ca-acb2-f0a301cf9a5f';
        $ApiPassword = '188cc40f-5f08-4867-8f83-8c33f1042e5f';
        
       $this->createRequest =  Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode("$publicKey:$ApiPassword"),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
       ]);

    }


    public function createPaymentSession()//1
    {
        // dd('444444444444444444');
        $url = 'https://api.merchant.geidea.net/payment-intent/api/v2/direct/session';
        $publicKey ='b87c4733-d581-40ca-acb2-f0a301cf9a5f';
        $ApiPassword = '188cc40f-5f08-4867-8f83-8c33f1042e5f';
        $orderId = '123';
        $amount = 100;
        $currency = 'EGP';
        $time=now()->format('m/d/Y h:i:s A');
        $amountStr = number_format($amount,2);
        $signature = "{$publicKey}{$amountStr}{$currency}{$orderId}{$time}";
        $hasData = hash_hmac('sha256',$signature,$ApiPassword,true);
        $hashed_signature = base64_encode($hasData);
        $data = [   
            "amount" => $amountStr,
            "currency" => $currency,
            "timestamp" => $time,
            "merchantReferenceId" => $orderId,
            "signature" => $hashed_signature,
            "paymentOperation" => "Pay",
            "appearance" => ["uiMode" => "modal"],
            "language" => "EN",
            "callbackUrl" => "https://www.callbackurl.com",
            "returnUrl" => "https://www.geidea.net",
            "customer" => [
                "email" => "customer@email.com",
                "phoneNumber" => "+966501231231"
            ],
            "initiatedBy" => "Internet",
        ];

        $request= $this->createRequest;
        $response = $request->post($url, $data);

        $responseResult = $response->json();

        if($responseResult['session']['id']){
            $sessionId = $responseResult['session']['id'];
            return response()->json(['sessionId' => $sessionId]);
        }
        // $this->authenticate($responseResult['session']['id']);
        dd($responseResult);

        // return view('plugins/paystack::checkoutIframe');

        // $sessionURL = $responseResult['session']['returnUrl'];

        // header('Location: ' . $sessionURL);

        // exit;
        // return $response->json(); // Return JSON response
    }


    public function checkout()//2
    {   
    
        return view('plugins/paystack::checkoutIframe');
    }


    public function handleCallback(Request $request)
    {
        // $orderId = $request->input('orderId');
        // $responseCode = $request->input('responseCode');
        // $responseMessage = $request->input('responseMessage');

        // if ($responseCode == "000") {
        //     return view('payment.success', compact('orderId', 'responseMessage'));
        // } else {
        //     return view('payment.failed', compact('orderId', 'responseMessage'));
        // }
    }


    public function paymentCallBack()
    {
        dd('paymentCallback');
    }



    
}