@php
    Theme::set('pageTitle', __('Search result for: ":query"', ['query' => BaseHelper::stringify(request()->input('q'))]));
    Theme::layout('full-width');
@endphp

@if($products->isNotEmpty())
    @include('plugins/ecommerce::themes.products')
@else
    <div class="text-center mt-50" style="min-height: 300px !important;">
        <h2 class="font-xl">{{ __('No products found') }}</h2>
        <p class="mt-10">{{ __('Try to search with another keyword') }}</p>
    </div>
@endif
