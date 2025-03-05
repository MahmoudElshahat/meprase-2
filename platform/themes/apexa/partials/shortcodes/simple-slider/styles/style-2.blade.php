@if ($sliders->isNotEmpty())
    <section class="slider__area shortcode-simple-slider shortcode-simple-slider-style-2">
    <div class="swiper-container slider_baner__active slider_baner_home6">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
                <div class="swiper-slide slider__single">
                    <div class="slider__bg" @if($image = $slider->image) data-background="{{ RvMedia::getImageUrl($image) }}" @endif></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="banner__content-three">
                                    @if (
                                            ($dataCount = $slider->getMetaData('data_count', true))
                                            && ($dataCountDes = $slider->getMetaData('data_count_description', true))
                                        )
                                        <div class="text-25-years">
                                            <span class="text-stroke-2">{{ $dataCount }}</span>
                                            <h4 class="text-experience">{!! BaseHelper::clean($dataCountDes) !!}</h4>
                                        </div>
                                    @endif

                                    @if ($subtitle = $slider->getMetaData('subtitle', true))
                                        <span class="ub-title aos-init aos-animate">{!! BaseHelper::clean($subtitle) !!}</span>
                                    @endif

                                    @if ($title = $slider->title)
                                        <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                                    @endif

                                    @if ($description = $slider->description)
                                        <p>{!! BaseHelper::clean($description) !!}</p>
                                    @endif

                                    @if (($url = $slider->link) && ($label = $slider->getMetaData('button_label', true)))
                                        <a href="{{ $url }}" class="btn">{!! BaseHelper::clean($label) !!}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="box-button-slider-bottom">
        <div class="container">
            <div class="testimonial__nav-four">
                <div class="testimonial-two-button-prev button-swiper-prev"><i class="flaticon-right-arrow"></i></div>
                <div class="testimonial-two-button-next button-swiper-next"><i class="flaticon-right-arrow"></i></div>
            </div>
        </div>
    </div>
</section>
@endif
