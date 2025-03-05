<section class="choose__area-three shortcode-about-us-information shortcode-about-us-information-style-9" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7 col-md-9 order-0 order-lg-2">
                <div class="choose__img-wrap-three">
                    @if ($image = $shortcode->image)
                        <div class="main-img">
                            {{ RvMedia::image($image, 'about-us') }}
                        </div>
                    @endif

                    @if($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'about-us', attributes: ['data-parallax' => '{"y" : 80 }']) }}
                    @endif
                </div>
            </div>
            <div class="col-lg-5">
                <div class="choose__content-three">
                    <div class="section-title mb-25 tg-heading-subheading animation-style3">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>
                    @if ($description = $shortcode->description)
                        <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if (count($tabs) > 0)
                        <div class="choose__list">
                            {!! Theme::partial('shortcodes.about-us-information.partials.featured-list', [
                                'tabs' => $tabs,
                                'iconWrapperClass' => 'choose__list-icon',
                                'contentWrapperClass' => 'choose__list-content',
                                'itemWrapperClass' => 'choose__list-box',
                             ]) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
