<section class="about__area-two about__bg shortcode-about-us-information shortcode-about-us-information-style-2" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="about__img-wrap-two">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'image') }}
                    @endif

                    <div class="experience__box-two">
                        <div class="experience__shape">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 82 295" fill="none" preserveAspectRatio="none">
                                <path d="M70.7685 260.479C77.6405 257.127 82 250.15 82 242.503L82 44.8205C82 36.5032 76.8524 29.054 69.0724 26.1128L-3.51784e-06 9.7784e-07L0 295L70.7685 260.479Z" fill="currentcolor" />
                            </svg>
                        </div>

                        @if (($dataCount = $shortcode->data_count) && ($dataCountDes = $shortcode->data_count_description))
                            <div class="experience__content">
                                <h4 class="title">{{ $dataCount }}</h4>
                                <p>{!! BaseHelper::clean($dataCountDes) !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content-two">
                    <div class="section-title mb-20 tg-heading-subheading animation-style3">
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
                    <div class="about__content-inner">
                        @if($tabs)
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    @foreach($tabs as $item)
                                        @continue(! ($title = Arr::get($item, 'title')))
                                        <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($image1 = $shortcode->image_1)
                            <div class="about__list-img">
                                {{ RvMedia::image($image1, 'image') }}
                            </div>
                        @endif

                    </div>
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
