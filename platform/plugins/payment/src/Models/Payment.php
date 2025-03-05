<?php

namespace Botble\Payment\Models;

use Botble\ACL\Models\User;
use Botble\Base\Facades\Html;
use Botble\Base\Models\BaseModel;
use Botble\Payment\Enums\PaymentMethodEnum;
use Botble\Payment\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Payment extends BaseModel
{
    protected $table = 'payments';

    protected $guarded =[];
    // protected $fillable = [
    //     'amount',
    //     'currency',
    //     'user_id',
    //     'charge_id',
    //     'payment_channel',
    //     'description',
    //     'status',
    //     'order_id',
    //     'payment_type',
    //     'customer_id',
    //     'customer_type',
    //     'refunded_amount',
    //     'refund_note',
    // ];

    protected $casts = [
        'payment_channel' => PaymentMethodEnum::class,
        'status' => PaymentStatusEnum::class,
        'metadata' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function customer(): MorphTo
    {
        return $this->morphTo()->withDefault();
    }

    public function getDescription(): string
    {
        $time = Html::tag('span', $this->created_at->diffForHumans(), ['class' => 'small italic']);

        return __('You have created a payment #:charge_id via :channel :time : :amount', [
            'charge_id' => $this->charge_id,
            'channel' => $this->payment_channel->label(),
            'time' => $time,
            'amount' => number_format($this->amount, 2) . $this->currency,
        ]);
    }

    // *************************************************************************
    public static function handle_payment_responce_data($responce){
        $data =[];

        $data['metadata'] = $responce ?? Null;//all gateway response
        if(isset($responce['session'])){
            $allResponse = $responce['session'];

           
            $data['terms_and_conditions'] = $allResponse['termsAndConditions'] ?? Null;
            $data['response_message'] = $allResponse['responseMessage'] ?? Null;
            $data['detailed_response_message'] = $allResponse['detailedResponseMessage'] ?? Null;
            // $data['language'] = $allResponse['language'] ?? Null;
            $data['amount'] = $allResponse['amount'] ?? Null;
            $data['gatway_session_id'] = $allResponse['id'] ?? Null;
            $data['currency'] = $allResponse['currency'] ?? Null;
            $data['response_code'] = $allResponse['responseCode'] ?? Null;
            $data['detailed_response_code'] = $allResponse['detailedResponseCode'] ?? Null;
            $data['link'] = $allResponse['link'] ?? Null;

            $data['einvoice_details_merchant_reference_id'] = $eInvoiceDetails['merchantReferenceId'] ?? Null;
            // store customer details
            if(isset($allResponse['customer'])){

                $customer = $allResponse['customer'];

                $data['gatway_customer_id'] = $customer['customerId'] ?? Null;
                $data['customer_email'] = $customer['email'] ?? Null;
                $data['customer_phone_number'] = $customer['phoneNumber'] ?? Null;
                $data['customer_phone_country_code'] = $customer['phoneCountryCode'] ?? Null;
                $data['customer_whatsApp_phone_country_code'] = $customer['whatsAppPhoneCountryCode'] ?? Null;
                $data['customer_whatsApp_phone_number'] = $customer['whatsAppPhoneNumber'] ?? Null;
                $data['customer_name'] = $customer['name'] ?? Null;
                $data['customer_postal_code'] = $customer['postalCode'] ?? Null;
                $data['customer_first_name'] = $customer['firstName'] ?? Null;
                $data['customer_last_name'] = $customer['lastName'] ?? Null;
                $data['customer_updated_by'] = $customer['updatedBy'] ?? Null;
                $data['customer_updated_date'] = $customer['updatedDate'] ?? Null;
                $data['customer_addresses'] = $customer['addresses'] ?? Null;
                $data['customer_custom_value'] = $customer['customValue'] ?? Null;
            }
            $data['customer_pay_link_qr_image'] = $customer['payLinkQrImage'] ?? Null;

            if(isset($allResponse['eInvoiceDetails'])){

                $eInvoiceDetails = $allResponse['eInvoiceDetails'];

                $data['einvoice_details_type'] = $eInvoiceDetails['type'] ?? Null;
                $data['einvoice_details_collect_customers_billing_shipping_address'] = $eInvoiceDetails['collectCustomersBillingShippingAddress'] ?? Null;
                $data['einvoice_details_pre_authorize_amount'] = $eInvoiceDetails['preAuthorizeAmount'] ?? Null;
                $data['einvoice_details_subtotal_without_tax'] = $eInvoiceDetails['subtotalWithoutTax'] ?? Null;
                $data['einvoice_details_subtotal_tax'] = $eInvoiceDetails['subtotalTax'] ?? Null;
                $data['einvoice_details_subtotal'] = $eInvoiceDetails['subtotal'] ?? Null;
                $data['einvoice_details_grand_total'] = $eInvoiceDetails['grandTotal'] ?? Null;
                $data['einvoice_details_extra_charges'] = $eInvoiceDetails['extraCharges'] ?? Null;
                $data['einvoice_details_extra_charges_type'] = $eInvoiceDetails['extraChargesType'] ?? Null;
                $data['einvoice_details_extra_charges_label'] = $eInvoiceDetails['extraChargesLabel'] ?? Null;
                $data['einvoice_details_charge_description'] = $eInvoiceDetails['chargeDescription'] ?? Null;
                
                $data['einvoice_details_invoice_discount'] = $eInvoiceDetails['invoiceDiscount'] ?? Null;
                $data['einvoice_details_invoice_discount_type'] = $eInvoiceDetails['invoiceDiscountType'] ?? Null;
                $data['einvoice_details_add_on_fees'] = $eInvoiceDetails['addOnFees'] ?? Null;
                $data['einvoice_details_add_on_fees_type'] = $eInvoiceDetails['addOnFeesType'] ?? Null;
                $data['einvoice_details_add_on_fees_label'] = $eInvoiceDetails['addOnFeesLabel'] ?? Null;
                $data['einvoice_details_invoice_discount_amount'] = $eInvoiceDetails['invoiceDiscountAmount'] ?? Null;
                $data['einvoice_details_extra_charge_amount'] = $eInvoiceDetails['extraChargeAmount'] ?? Null;
                $data['einvoice_details_add_on_fees_amount'] = $eInvoiceDetails['addOnFeesAmount'] ?? Null;
                
            }

            $data['eInvoice_sent_links'] = $allResponse['eInvoiceSentLinks'] ?? Null;
            $data['custom_fields'] = $allResponse['customFields'] ?? Null;
            $data['payment_intent_id'] = $allResponse['paymentIntentId'] ?? Null;
            $data['parent_Payment_intent_id'] = $allResponse['parentPaymentIntentId'] ?? Null;
            $data['number'] = $allResponse['number'] ?? Null;
            $data['url_slug'] = $allResponse['urlSlug'] ?? Null;
            $data['type'] = $allResponse['type'] ?? Null;
            $data['merchantId'] = $allResponse['merchantId'] ?? Null;
            $data['expiryDate'] = $allResponse['expiryDate'] ?? Null;
            $data['activation_date'] = $allResponse['activationDate'] ?? Null;
            $data['gatway_status'] = $allResponse['status'] ?? Null;
            $data['eInvoice_upload_id'] = $allResponse['eInvoiceUploadId'] ?? Null;
            $data['static_pay_link_id'] = $allResponse['staticPaylinkId'] ?? Null;
            $data['subscription_id'] = $allResponse['subscriptionId'] ?? Null;
            $data['subscription_occurrence_id'] = $allResponse['subscriptionOccurrenceId'] ?? Null;
            $data['is_pending'] = $allResponse['isPending'] ?? Null;
            $data['collect_customers_billing_shipping_address'] = $allResponse['collectCustomersBillingShippingAddress'] ?? Null;
            $data['created_date'] = $allResponse['createdDate'] ?? Null;
            $data['created_by'] = $allResponse['createdBy'] ?? Null;
            $data['updated_date'] = $allResponse['updatedDate'] ?? Null;
            $data['updated_by'] = $allResponse['updatedBy'] ?? Null;
            $data['metadata'] = [];
            
            return $data;
        }

    }






}
