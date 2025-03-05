<?php

namespace Botble\Paystack\Services\Gateways;

use Botble\Paystack\Services\Abstracts\PaystackPaymentAbstract;
use Illuminate\Http\Request;

class PaystackPaymentService extends PaystackPaymentAbstract
{
    public function makePayment(Request $request)
    {
        // dd('PaystackPaymentService');
        // $url = 'https://api.merchant.geidea.net/payment-intent/api/v2/direct/session';
        // $publicKey ='b87c4733-d581-40ca-acb2-f0a301cf9a5f';
        // $ApiPassword = '188cc40f-5f08-4867-8f83-8c33f1042e5f';
        // $orderId = '123';
        // $amount = 100;
        // $currency = 'SAR';
        // $time=now()->format('m/d/Y h:i:s A');
        // $amountStr = number_format($amount,2);
        // $signature = "{$publicKey}{$amountStr}{$currency}{$orderId}{$time}";
        // $hasData = hash_hmac('sha256',$signature,$ApiPassword,true);
        // $hashed_signature = base64_encode($hasData);
        // $data = [   
        //     "amount" => $amountStr,
        //     "currency" => $currency,
        //     "timestamp" => $time,
        //     "merchantReferenceId" => $orderId,
        //     "signature" => $hashed_signature,
        //     "paymentOperation" => "Pay",
        //     "appearance" => ["uiMode" => "modal"],
        //     "language" => "EN",
        //     "callbackUrl" => "https://www.callbackurl.com",
        //     "returnUrl" => "https://www.geidea.net",
        //     "customer" => [
        //         "email" => "customer@email.com",
        //         "phoneNumber" => "+966501231231"
        //     ],
        //     "initiatedBy" => "Internet",
        // ];
        // $response = Http::withHeaders([
        //     'Authorization' => 'Basic ' . base64_encode("$publicKey:$ApiPassword"),
        //     'Accept' => 'application/json',
        //     'Content-Type' => 'application/json',
        // ])->post($url, $data);

        // return $response->json(); // Return JSON response

    }

    
    public function afterMakePayment(Request $request)
    {
        // dd('afterMakePayment');
    }

    /**
     * List currencies supported https://support.paystack.com/hc/en-us/articles/360009973779
     */
    public function supportedCurrencyCodes(): array
    {
        return [
            'EGP',
            // 'GHS',
            // 'USD',
            // 'ZAR',
            // 'KES',
        ];
    }
}
