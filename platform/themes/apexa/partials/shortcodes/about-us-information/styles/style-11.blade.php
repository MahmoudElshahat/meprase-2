<section class="about__area-four shortcode-about-us-information shortcode-about-us-information-style-11" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-9 col-sm-10">
                <div class="about__img-wrap-four">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'about-us-information') }}
                    @endif

                    @if ($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'about-us-information') }}
                    @endif

                    @if (($dataCount = $shortcode->data_count) && ($dataCountDes = $shortcode->data_count_description))
                        <div class="about__award-box">
                            <div class="icon">
                                <i class="flaticon-trophy"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">{{ $dataCount }}</h2>
                                <p>{!! BaseHelper::clean($dataCountDes) !!}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content-four">
                    <div class="section-title mb-30">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>
                    <div class="about__content-inner-three">
                        @if(count($tabs))
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    @foreach($tabs as $item)
                                        @continue(! ($title = Arr::get($item, 'title')))

                                        <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($image2 = $shortcode->image_2)
                            <div class="about__list-img-two">
                                {{ RvMedia::image($image2, 'about-us') }}
                            </div>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                        <a href="{{ $buttonUrl }}" class="btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
