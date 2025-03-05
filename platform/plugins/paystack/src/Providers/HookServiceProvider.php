<?php

namespace Botble\Paystack\Providers;

use Botble\Base\Facades\Html;
use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Payment\Facades\PaymentMethods;
use Botble\Paystack\Forms\PaystackPaymentMethodForm;
use Botble\Paystack\Services\Gateways\PaystackPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Throwable;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\Http;
use Botble\Payment\Models\Payment;
class HookServiceProvider extends ServiceProvider
{
    public function boot(): void
    {   


        add_filter(PAYMENT_FILTER_ADDITIONAL_PAYMENT_METHODS, [$this, 'registerPaystackMethod'], 16, 2);
        
        $this->app->booted(function () {
            add_filter(PAYMENT_FILTER_AFTER_POST_CHECKOUT, [$this, 'checkoutWithPaystack'], 16, 2);
        });
        
        add_filter(PAYMENT_METHODS_SETTINGS_PAGE, [$this, 'addPaymentSettings'], 97);

        add_filter(BASE_FILTER_ENUM_ARRAY, function ($values, $class) {
            if ($class == PaymentMethodEnum::class) {
                $values['PAYSTACK'] = PAYSTACK_PAYMENT_METHOD_NAME;
            }

            return $values;
        }, 21, 2);

        add_filter(BASE_FILTER_ENUM_LABEL, function ($value, $class) {
            if ($class == PaymentMethodEnum::class && $value == PAYSTACK_PAYMENT_METHOD_NAME) {
                $value = 'Paystack';
            }

            return $value;
        }, 21, 2);

        add_filter(BASE_FILTER_ENUM_HTML, function ($value, $class) {
            if ($class == PaymentMethodEnum::class && $value == PAYSTACK_PAYMENT_METHOD_NAME) {
                $value = Html::tag(
                    'span',
                    PaymentMethodEnum::getLabel($value),
                    ['class' => 'label-success status-label']
                )
                    ->toHtml();
            }

            return $value;
        }, 21, 2);

        add_filter(PAYMENT_FILTER_GET_SERVICE_CLASS, function ($data, $value) {
            if ($value == PAYSTACK_PAYMENT_METHOD_NAME) {
                $data = PaystackPaymentService::class;
            }

            return $data;
        }, 20, 2);

        add_filter(PAYMENT_FILTER_PAYMENT_INFO_DETAIL, function ($data, $payment) {
            if ($payment->payment_channel == PAYSTACK_PAYMENT_METHOD_NAME) {
                $paymentService = (new PaystackPaymentService());
                $paymentDetail = $paymentService->getPaymentDetails($payment);
                if ($paymentDetail) {
                    $data = view(
                        'plugins/paystack::detail',
                        ['payment' => $paymentDetail, 'paymentModel' => $payment]
                    )->render();
                }
            }

            return $data;
        }, 20, 2);

        add_filter(PAYMENT_FILTER_GET_REFUND_DETAIL, function ($data, $payment, $refundId) {
            if ($payment->payment_channel == PAYSTACK_PAYMENT_METHOD_NAME) {
                $refundDetail = (new PaystackPaymentService())->getRefundDetails($refundId);
                if (! Arr::get($refundDetail, 'error')) {
                    $refunds = Arr::get($payment->metadata, 'refunds');
                    $refund = collect($refunds)->firstWhere('data.id', $refundId);
                    $refund = array_merge($refund, Arr::get($refundDetail, 'data', []));

                    return array_merge($refundDetail, [
                        'view' => view(
                            'plugins/paystack::refund-detail',
                            ['refund' => $refund, 'paymentModel' => $payment]
                        )->render(),
                    ]);
                }

                return $refundDetail;
            }

            return $data;
        }, 20, 3);
    }

    public function addPaymentSettings(?string $settings): string
    {
        // dd('HookServiceProvider-addPaymentSettings');

        return $settings . PaystackPaymentMethodForm::create()->renderForm();
    }

    public function registerPaystackMethod(?string $html, array $data): string
    {
        // dd('HookServiceProvider-registerPaystackMethod');

        PaymentMethods::method(PAYSTACK_PAYMENT_METHOD_NAME, [
            'html' => view('plugins/paystack::methods', $data)->render(),
        ]);
        // $test = view('plugins/paystack::methods');
        // dd('HookServiceProvider-registerPaystackMethod',$test);
        return $html;
    }

    public function checkoutWithPaystack(array $data, Request $request): array
    {   

        $data['error'] = false;
        $data['message'] = __('Payment proccess!');
        // dd('HookServiceProvider-checkoutWithPaystack');
        // dd($data);
        return $data;
        if ($data['type'] !== PAYSTACK_PAYMENT_METHOD_NAME) {
            return $data;
        }
        // $supportedCurrencies = (new PaystackPaymentService())->supportedCurrencyCodes();
        // $paymentData = apply_filters(PAYMENT_FILTER_PAYMENT_DATA, [], $request);

        // if (! in_array($paymentData['currency'], $supportedCurrencies)) {
        //     $data['error'] = true;
        //     $data['message'] = __(
        //         ":name doesn't support :currency. List of currencies supported by :name: :currencies.",
        //         [
        //             'name' => 'Paystack',
        //             'currency' => $paymentData['currency'],
        //             'currencies' => implode(', ', $supportedCurrencies),
        //         ]
        //     );

        //     return $data;
        // }

        //try {
        // $baseUrl = config('services.giedea.base_url');
        // $publicKey =config('services.giedea.public_key');
        // $apiPassword = config('services.giedea.password');
        // $defualt_currency = config('services.giedea.currency');

        // $createRequest =  Http::withHeaders([
        //         'Authorization' => 'Basic ' . base64_encode("$publicKey:$apiPassword"),
        //         'Accept' => 'application/json',
        //         'Content-Type' => 'application/json',
        // ]);

        // // dd($data);
        $publicKey ='b87c4733-d581-40ca-acb2-f0a301cf9a5f';
        $ApiPassword = '188cc40f-5f08-4867-8f83-8c33f1042e5f';
       $createRequest =  Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode("$publicKey:$ApiPassword"),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
       ]);
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

    // $request= $createRequest->createRequest;
    $response = $createRequest->post($url, $data);

    $responseResult = $response->json();

    // dd($responseResult);
    if(isset($responseResult['session']['id'])){

        $sessionId = $responseResult['session']['id'];

        $data['sessionId'] = $sessionId;
        // return response()->json([
        //     'sessionId' => $sessionId,
        //     // 'token'=>'vbiejvjkdnvjhdbjkhvnkjdvjkndkjvdjk',
        // ]);
    }

        //     if (!isset($response['status'])) {//if rewsponse have status this mean respone is error with 400

        //         $dataToStore = Payment::handle_payment_responce_data($response);
        //         foreach ($dataToStore as $key => $value) {
        //             if (is_array($value)) {
        //                 $dataToStore[$key] = json_encode($value);
        //             }
        //         }
            
        //         Payment::insert([$dataToStore]);
        //         header('Location: ' . $responseDetails['link']);
        //         exit;
        //     }

        //     return redirect()->back()->with(['error'=>__('Payment failed!')]);

            $data['error'] = false;
            $data['message'] = __('Payment proccess!');

        // } catch (Throwable $exception) {
        //     $data['error'] = true;
        //     $data['message'] = json_encode($exception->getMessage());
        // }

        return $data;
    }
}
