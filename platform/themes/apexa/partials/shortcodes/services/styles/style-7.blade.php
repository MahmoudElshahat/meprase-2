<section class="team__area-three marketing__area-home8 services__bg-seven shortcode-services shortcode-services-style-7"  @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-6 mb-50">
                <div class="section-title tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif`
                </div>
            </div>

            @if ($description = $shortcode->description)
                <div class="col-xl-5 col-lg-6 mb-50">
                    <div class="section-content">
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="row gutter-24">
            @foreach($services as $service)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="card-services-type-01">
                        <div class="card-icon">
                            <div class="icon services-icon icon-large">
                                @if($iconImage = $service->getMetaData('icon_image', true))
                                    {{ RvMedia::image($iconImage, 'icon') }}
                                @elseif($icon = $service->getMetaData('icon', true))
                                    <x-core::icon :name="$icon"/>
                                @endif
                            </div>
                        </div>
                        <div class="card-info">
                            <a title="{{ $service->name }}" href="{{ $service->url }}"><h5>{{ $service->name }}</h5></a>

                            @if ($description = $service->description)
                                <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="services-bottom-content">
            @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                <a href="{{ $buttonUrl }}" class="btn btn-two">{{ $buttonLabel }}</a>
            @endif
        </div>
    </div>
</section>