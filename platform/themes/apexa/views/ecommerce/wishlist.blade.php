@php
    Theme::set('pageTitle', __('Product Wishlist'));
    Theme::layout('full-width');
@endphp

@include('plugins/ecommerce::themes.wishlist')