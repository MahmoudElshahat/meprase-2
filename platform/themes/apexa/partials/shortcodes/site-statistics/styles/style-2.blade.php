<section class="journey_area-seven shortcode-site-statistics" @style($variablesStyle)>
    <div class="container">
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

                        @if ($description = $shortcode->description)
                            <p class="mb-25">{!! BaseHelper::clean($description) !!}</p>
                        @endif

                        @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                            <a
                                href="{{ $buttonUrl }}"
                                class="btn"
                                data-aos="fade-up"
                                data-aos-delay="600"
                            >
                                {!! BaseHelper::clean($buttonLabel) !!}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="box-counter-home7">
            <div class="row justify-content-center">
                {!! Theme::partial('shortcodes.site-statistics.partials.items', compact('tabs')) !!}
            </div>
        </div>
    </div>
</section>
