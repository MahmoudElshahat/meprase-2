@php
    $productSidebar = dynamic_sidebar('product_sidebar');
@endphp

<div class="row">
    <div @class(['col-lg-8' => $productSidebar, 'col-lg-12' => ! $productSidebar])>
        <div @class(['row row-cols-md-2 row-cols-lg-3 g-3 mt-5', 'row-cols-xl-3' => ! $productSidebar])>
            @foreach($products as $product)
                <div class="col">
                    @include(EcommerceHelper::viewPath('includes.product-item'))
                </div>
            @endforeach
        </div>

        @if ($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $products->total() > 0)
            <div class="view-more mb-5 text-center wow animated fadeIn">
                {{ $products->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) }}
            </div>
        @endif
    </div>

    @if($productSidebar)
        <aside class="col-lg-4">
            <aside class="product__sidebar">
                {!! $productSidebar !!}
            </aside>
        @endif
</div>

@include(EcommerceHelper::viewPath('includes.quick-shop-modal'))
@include(EcommerceHelper::viewPath('includes.quick-view-modal'))