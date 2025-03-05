@extends('plugins/ecommerce::orders.master')

@section('title', __('Checkout'))

@section('content')
    @if (Cart::instance('cart')->isNotEmpty())
        @if (is_plugin_active('payment') && $orderAmount)
            @include('plugins/payment::partials.header')
        @endif
        
        {!! $checkoutForm->renderForm() !!}

        @if (is_plugin_active('payment'))
            @include('plugins/payment::partials.footer')
        @endif
    @else
        <div class="container">
            <div class="alert alert-warning my-5">
                <span>{!! BaseHelper::clean(__('No products in cart. :link!', ['link' => Html::link(BaseHelper::getHomepageUrl(), __('Back to shopping'))])) !!}</span>
            </div>
        </div>
    @endif
@stop

@push('footer')
    <script type="text/javascript" src="{{ asset('vendor/core/core/js-validation/js/js-validation.js') }}?v=1.0.1"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://www.merchant.geidea.net/hpp/geideaCheckout.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastr CSS -->
    
    <!-- jQuery (Required for toastr) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        function createAndStartPayment() {

            let token = document.querySelector('input[name="checkout-token"]').value;
            let form = document.querySelector("#checkout-form");

            $('.payment-checkout-btn-step').prop('disabled', true).text('Processing. Please wait...');
            let formData = new FormData(form);
            $.ajax({
            url: "{{ route('checkout.post') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: formData,
            processData: false,  // Prevent jQuery from converting the data into a query string
            contentType: false,  // Ensure proper form submission
            success: function(response) {
                if (response.sessionId) {
                    startPayment(response.sessionId);
                } else {
                    toastr.error(response.message)
                }
            },
            error: function(response) {
                // alert("Error: " + response);
                toastr.error(response.message)
                // console.log('error',response)
            },
            complete: function() {
                $('.payment-checkout-btn-step').prop("disabled", false).text("{{ __('Checkout') }}"); // Re-enable button after AJAX completes
            }
        });
                }

        function startPayment(sessionId) {
            var payment = new GeideaCheckout(onSuccess, onError, onCancel);
            payment.startPayment(sessionId);
        }

        let onSuccess = function(data) {

            console.log('payment success: ' + data.responseCode);

            // alert('Success:' + '\n' +
            // data.responseCode + '\n' +
            // data.responseMessage + '\n' +
            // data.detailedResponseCode + '\n' +
            // data.detailedResponseMessage + '\n' +
            // data.orderId + '\n' +
            // data.reference);
        };

        let onError = function(data) {

            console.log('payment Error: ' + data.responseCode);
            
            // alert('Error:' + '\n' +
            // data.responseCode + '\n' +
            // data.responseMessage + '\n' +
            // data.detailedResponseCode + '\n' +
            // data.detailedResponseMessage + '\n' +
            // data.orderId + '\n' +
            // data.reference);
        };

        let onCancel = function(data) {

            console.log('payment canceled: ' + data.responseCode);

            // alert('Payment Cancelled:' + '\n' +
            // data.responseCode + '\n' +
            // data.responseMessage + '\n' +
            // data.detailedResponseCode + '\n' +
            // data.detailedResponseMessage + '\n' +
            // data.orderId + '\n' +
            // data.reference);
        };
    </script>
@endpush
