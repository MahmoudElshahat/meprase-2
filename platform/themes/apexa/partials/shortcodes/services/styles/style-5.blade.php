<section class="services__area-seven services__bg-seven shortcode-services shortcode-services-style-5" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="services__item-wrap-two">
            <div class="row justify-content-center gutter-24">
                @foreach($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__icon-five">
                                <div class="icon services-icon icon-medium">
                                    @if($iconImage = $service->getMetaData('icon_image', true))
                                        {{ RvMedia::image($iconImage, 'icon') }}
                                    @elseif($icon = $service->getMetaData('icon', true))
                                        <x-core::icon :name="$icon"/>
                                    @endif
                                </div>
                                <div class="services__icon-shape">
                                    <div class="shape one">
                                        <svg width="68" height="78" viewBox="0 0 68 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M31.1376 1.6526C32.9089 0.629968 35.0911 0.629967 36.8624 1.6526L64.9126 17.8474C66.6839 18.87 67.775 20.7599 67.775 22.8052V55.1948C67.775 57.2401 66.6839 59.13 64.9126 60.1526L36.8624 76.3474C35.0911 77.37 32.9089 77.37 31.1376 76.3474L3.0874 60.1526C1.31615 59.13 0.22501 57.2401 0.22501 55.1948V22.8052C0.22501 20.7599 1.31614 18.87 3.08739 17.8474L31.1376 1.6526Z" fill="#FEF6E6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="services__content-five">
                                <h2 class="title">
                                    <a class="truncate-1-custom" title="{{ $service->name }}" href="{{ $service->url }}">{{ $service->name }}</a>
                                </h2>

                                @if ($description = $service->description)
                                    <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
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
