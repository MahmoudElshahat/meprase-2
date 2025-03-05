@if (EcommerceHelper::isValidToProcessCheckout())
    <button
        class="btn payment-checkoutbtn payment-checkout-btn-step float-end"
        data-processing-text="{{ __('Processing. Please wait...') }}"
        data-error-header="{{ __('Error') }}"
        type="button"
        onclick="createAndStartPayment(this)"
    >
        {{ __('Checkout') }}    
    </button>
@else
    <span class="btn payment-checkout-btn-step float-end disabled">
        {{ __('Checkout') }}
    </span>
@endif
