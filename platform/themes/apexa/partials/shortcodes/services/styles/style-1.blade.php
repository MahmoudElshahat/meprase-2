<section class="services-area services-bg shortcode-services shortcode-services-style-1" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="services-item-wrap">
            <div class="row justify-content-center">
                @foreach($services as $service)
                <?php  $serviceurl=str_replace('/services/','/products/',$service->url); ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item">
                            <div class="services-thumb">
                                
                                <a href="{{ $serviceurl }}" class="shine-animate">
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
                                <h4 class="title"><a title="{{ $service->name }}" class="truncate-1-custom" href="{{ $serviceurl }}">{{ $service->name }}</a></h4>
                                @if ($description = $service->description)
                                    <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                @endif

                                <a href="{{ $serviceurl }}" class="btn">{{ __('Read More') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="services-bottom-content">
            @if ($description = $shortcode->description)
                <p>{!! BaseHelper::clean($description) !!}</p>
            @endif

            @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                <a href="{{ $buttonUrl }}" class="btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
            @endif
        </div>
    </div>
</section>
