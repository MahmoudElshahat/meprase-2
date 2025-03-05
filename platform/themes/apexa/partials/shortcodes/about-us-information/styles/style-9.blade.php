<section class="about__area-four shortcode-about-us-information shortcode-about-us-information-style-9" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 mb-30">
                <div class="about__content-four">
                    <div class="section-title mb-30">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                    @endif
                    <div class="about__content-inner-three">
                        @if (count($tabs))
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    @foreach($tabs as $item)
                                        @continue(! $title = Arr::get($item, 'title'))

                                        <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($image2 = $shortcode->image_2)
                            <div class="about__list-img-two">
                                {{ RvMedia::image($image2, 'image') }}
                            </div>
                        @endif

                    </div>
                    <div class="about-bottom about-bottom-two">
                        {!! Theme::partial('shortcodes.about-us-information.partials.author', compact('shortcode')) !!}

                        {!! Theme::partial('shortcodes.about-us-information.partials.contact', compact('shortcode')) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-9 col-sm-10 mb-30">
                <div class="about__img-wrap-four about__img-wrap-home8">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'image') }}
                    @endif

                    @if ($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'image') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
