@php
    $minPrice = theme_option('quotation_form_min_price', 0);
    $maxPrice = theme_option('quotation_form_max_price', 100000);
@endphp

<div class="range-slider-wrap">
    <div class="range-top">
        <p>{{ __('Price') }}</p>
        <span>$<strong id="rangeValue">0</strong></span>
    </div>
    <input id="quotation-form-price" name="{{ $name }}" class="range" type="range" value="0" min="{{ $minPrice }}" max="{{ $maxPrice }}">
</div>
