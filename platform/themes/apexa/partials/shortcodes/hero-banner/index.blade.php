@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;
    $image = $shortcode->image;
    $image1 = $shortcode->image_1;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

<section
    @class([
        'shortcode-hero-banner banner-area banner-bg',
         'banner__bg-three' => $image,
         'has-header-transparent-and-ecommerce' =>
         theme_option('display_header_top', true)
         && theme_option('is_header_transparent')
         && is_plugin_active('ecommerce')
    ])
    @style($variablesStyle)
>
    <div class="shortcode-hero-banner-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="{{ theme_option('header_style') == 3 ? 'banner__content-three' : 'banner-content' }}">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title" data-aos="fade-up" data-aos-delay="0">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title" data-aos="fade-up" data-aos-delay="200">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p data-aos="fade-up" data-aos-delay="400">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                        <a href="{{ $buttonUrl }}" class="btn" data-aos="fade-up" data-aos-delay="600">{!! BaseHelper::clean($buttonLabel) !!}</a>
                    @endif
                </div>
            </div>

            @php
                $image = $shortcode->image;
                $image1 = $shortcode->image_1;
            @endphp
            @if ($image || $image1)
                <div class="col-lg-6">
                    <div class="banner__img-two">
                        @if($image)
                            {{ RvMedia::image($image, $title) }}
                        @endif

                        @if ($image1)
                            {{ RvMedia::image($image1, $title) }}
                        @endif
                    </div>
                </div>
            @endif
        </div>

        @if ($shortcode->display_social_links && ($items = Theme::getSocialLinks()))
            <div class="banner-social">
                <h5 class="title">{{ __('Follow us') }}</h5>
                <ul class="list-wrap">
                    @foreach($items as $item)
                        <li>
                            <a title="{{ $item->getName() }}" href="{{ $item->getUrl() }}">
                                {!! $item->getIconHtml() !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($shortcode->display_button_scroll_down)
            <div class="banner-scroll">
                <a class="btn-scroll-down" href="#"> {{ __('Scroll Down') }} <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        @endif
    </div>
</section>
