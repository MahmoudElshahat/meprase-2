@php
    Theme::set('pageTitle', $category->name);
    $services = $category->services;
@endphp

<section class="services-area services-bg shortcode-services">
    <div class="container">
        <div class="services-item-wrap">
            <div class="row justify-content-center">
                @foreach($services as $service)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item">
                            <div class="services-thumb">
                                <a href="{{ $service->url }}" class="shine-animate">
                                    {{ RvMedia::image($service->image, $service->name, 'small-rectangle') }}
                                </a>
                            </div>
                            <div class="services-content">
                                <div class="icon services-icon">
                                    @if($iconImage = $service->getMetaData('icon_image', true))
                                        {{ RvMedia::image($iconImage, 'icon') }}
                                    @elseif($icon = $service->getMetaData('icon', true))
                                        <x-core::icon :name="$icon"/>
                                    @endif
                                </div>
                                <h4 class="title"><a title="{{ $service->name }}" class="truncate-1-custom" href="{{ $service->url }}">{{ $service->name }}</a></h4>
                                @if ($description = $service->description)
                                    <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                @endif

                                <a href="{{ $service->url }}" class="btn">{{ __('Read More') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>