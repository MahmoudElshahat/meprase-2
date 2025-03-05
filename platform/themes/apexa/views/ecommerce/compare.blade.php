@php
    Theme::set('pageTitle', __('Product Compare'));
    Theme::layout('full-width');
@endphp

@include('plugins/ecommerce::themes.compare')