<section class="about-area pt-120 pb-120 shortcode-about-us-information shortcode-about-us-information-style-1" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-img-wrap">
                    @if ($image = $shortcode->image)
                        <div class="mask-img-wrap">
                            {{ RvMedia::image($image, 'about-us-information-image') }}
                        </div>
                    @endif

                    <div class="experience-year">
                        <div class="icon">
                            <i class="flaticon-trophy"></i>
                        </div>

                        @if (($dataCount = $shortcode->data_count) && ($dataCountDes = $shortcode->data_count_description))
                            <div class="content">
                                <h6 class="circle rotateme">{!! BaseHelper::clean($dataCountDes) !!} {{ $dataCount }} -</h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title mb-35 tg-heading-subheading animation-style3">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>

                    @if (count($tabs) > 0)
                        <div class="about-list">
                            {!! Theme::partial('shortcodes.about-us-information.partials.featured-list', compact('tabs')) !!}
                        </div>
                    @endif

                    @if ($description = $shortcode->description)
                        <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    <div class="about-bottom">
                        {!! Theme::partial('shortcodes.about-us-information.partials.author', compact('shortcode')) !!}

                        @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                            <a href="{{ $buttonUrl }}" class="btn btn-two">{!! BaseHelper::clean($buttonLabel) !!}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
