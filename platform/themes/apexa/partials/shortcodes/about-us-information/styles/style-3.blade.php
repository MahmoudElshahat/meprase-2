<section class="about__area-three about__bg-two shortcode-about-us-information shortcode-about-us-information-style-2" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="about__img-wrap-three">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'image') }}
                    @endif

                    @if ($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'image', attributes: ['data-parallax' => '{"x" : 50 }']) }}
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content-three">
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
                    <div class="about__content-inner about__content-inner-two">
                        @if (($dataCount = $shortcode->data_count) && ($dataCountDes = $shortcode->data_count_description))
                            <div class="experience__box-three">
                                <div class="title">
                                    <span>{{ $dataCount }}</span>
                                </div>
                                <p>{!! BaseHelper::clean($dataCountDes) !!}</p>
                            </div>
                        @endif

                        @if (count($tabs) > 0)
                            <div class="about__list-box about__list-box-two">
                                <ul class="list-wrap">
                                    @foreach($tabs as $item)
                                        @continue(! ($title = Arr::get($item, 'title')))
                                        <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="about-bottom about-bottom-two">
                        {!! Theme::partial('shortcodes.about-us-information.partials.author', compact('shortcode')) !!}

                        {!! Theme::partial('shortcodes.about-us-information.partials.contact', compact('shortcode')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
