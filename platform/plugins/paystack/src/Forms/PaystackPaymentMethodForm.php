<?php

namespace Botble\Paystack\Forms;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;
use Botble\Payment\Forms\PaymentMethodForm;

class PaystackPaymentMethodForm extends PaymentMethodForm
{
    public function setup(): void
    {   

        // * form of integration in dashboard
        parent::setup();

        $this
            ->paymentId(PAYSTACK_PAYMENT_METHOD_NAME)
            ->paymentName('Giedia')
            ->paymentDescription(__('Customer can buy product and pay directly using Visa, Credit card via :name', ['name' => 'Paystack']))
            ->paymentLogo("https://files.readme.io/9739219-geidea-logo.svg")
            ->paymentUrl('https://docs.geidea.net/reference/welcome-to-geideas-api-reference-documentation')
            ->paymentInstructions(view('plugins/paystack::instructions')->render())
            ->add(
                sprintf('payment_%s_public', PAYSTACK_PAYMENT_METHOD_NAME),
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Public Key'))
                    ->value(BaseHelper::hasDemoModeEnabled() ? '*******************************' : get_payment_setting('public', PAYSTACK_PAYMENT_METHOD_NAME))
            )
            ->add(
                sprintf('payment_%s_secret', PAYSTACK_PAYMENT_METHOD_NAME),
                'password',
                TextFieldOption::make()
                    ->label(__('Secret Key'))
                    ->value(BaseHelper::hasDemoModeEnabled() ? '*******************************' : get_payment_setting('secret', PAYSTACK_PAYMENT_METHOD_NAME))
            );
    }
}
