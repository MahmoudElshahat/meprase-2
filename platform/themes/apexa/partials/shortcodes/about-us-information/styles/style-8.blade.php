<section class="choose-area shortcode-about-us-information shortcode-about-us-information-style-8" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="choose-img-wrap">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'image') }}
                    @endif

                   @if ($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'image', attributes: ['data-parallax' => '{"x" : 50 }']) }}
                   @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-content">
                    <div class="section-title white-title mb-30 tg-heading-subheading animation-style3">
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
                        <div class="choose-list">
                            {!! Theme::partial('shortcodes.about-us-information.partials.featured-list', compact('tabs')) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
