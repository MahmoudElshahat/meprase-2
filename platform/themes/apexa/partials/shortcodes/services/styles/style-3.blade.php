<section class="services__area-three services__bg-three shortcode-services shortcode-services-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title white-title text-center mb-50 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center gutter-24">
            @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="services__item-three services-item">
                        <div class="services__item-top">
                            <div class="services__icon-three services-icon">
                                @if($iconImage = $service->getMetaData('icon_image', true))
                                    {{ RvMedia::image($iconImage, 'icon') }}
                                @elseif($icon = $service->getMetaData('icon', true))
                                    <x-core::icon :name="$icon"/>
                                @endif
                            </div>
                            <div class="services__item-top-title">
                                <h2 class="title">
                                    <a class="truncate-1-custom" title="{{ $service->name }}" href="{{ $service->url }}">{{ $service->name }}</a>
                                </h2>
                            </div>
                        </div>
                        <div class="services__content-three">
                            @if ($description = $service->description)
                                <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif

                            <a href="{{ $service->url }}" class="btn btn-two">{{ __('Read More') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
