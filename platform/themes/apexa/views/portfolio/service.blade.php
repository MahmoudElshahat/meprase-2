@php
    $serviceSidebar = dynamic_sidebar('service_sidebar');
    Theme::set('pageTitle', __('Service Details'))
@endphp

<section class="services__details-area">
    <div class="container">
        <div class="services__details-wrap">
            <div class="row">
                <div class="{{ $serviceSidebar ? 'col-70' : 'col-100' }} order-0 order-lg-2">
                    @if($image = $service->image)
                        <div class="services__details-thumb">
                            {{ RvMedia::image($image, $service->name, 'medium-rectangle') }}
                        </div>
                    @endif
                    <div class="services__details-content">

                        <h2 class="title">{{ $service->name }}</h2>

                        @if ($description = $service->description)
                            <p>{!! BaseHelper::clean($description) !!}</p>
                        @endif

                        <div class="ck-content">
                            {!! BaseHelper::clean($service->content) !!}
                        </div>
                    </div>
                </div>

                @if($serviceSidebar)
                    <div class="col-30">
                        <aside class="services__sidebar">
                            {!! $serviceSidebar !!}
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
