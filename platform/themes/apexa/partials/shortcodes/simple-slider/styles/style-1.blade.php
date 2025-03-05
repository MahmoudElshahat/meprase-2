@if ($sliders->isNotEmpty())
    <section class="slider__area shortcode-simple-slider shortcode-simple-slider-style-1">
        <div class="swiper-container slider__active">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide slider__single">
                        <div class="slider__bg" @if($image = $slider->image) data-background="{{ RvMedia::getImageUrl($image) }}" @endif></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider__content">
                                        @if ($subtitle = $slider->getMetaData('subtitle', true))
                                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
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
    </section>
@endif
