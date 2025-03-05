@php
    Theme::set('pageTitle', $brand->name);
    Theme::layout('full-width');
@endphp

<div class="container">
    <div class="row">
        @include(EcommerceHelper::viewPath('includes.product-items'))
    </div>
</div>
