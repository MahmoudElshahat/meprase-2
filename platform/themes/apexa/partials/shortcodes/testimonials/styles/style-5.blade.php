<section class="testimonial__area-three shortcode-testimonials shortcode-testimonials-style-5" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                {!! Theme::partial('portfolio.request-quote-form') !!}
            </div>
            <div class="col-lg-6">
                <div class="testimonial__wrap">
                    <div class="testimonial__inner-top">
                        <div class="testimonial-slider-dot">
                            <div class="swiper testimonial__nav-three">
                                <div class="swiper-wrapper">
                                    @foreach($testimonials->pluck('name', 'image') as  $avatar => $name)
                                        <div class="swiper-slide">
                                            <button>
                                                {{ RvMedia::image($avatar, $name, 'thumb') }}
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="icon"><i class="fas fa-quote-right"></i></div>
                    </div>
                    <div class="swiper-container testimonial-active-three">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-item testimonial__item-four">
                                        <div class="testimonial-info">
                                            <h4 class="title">{{ $testimonial->name }}</h4>

                                            @if ($company = $testimonial->company)
                                                <span>{!! BaseHelper::clean($company) !!}</span>
                                            @endif
                                        </div>
                                        <div class="testimonial__rating">
                                            @php
                                                $ratingStar = round((int) $testimonial->getMetaData('rating_star', true))
                                            @endphp

                                            @foreach(range(1, 5) as $i)
                                                <i @class(['fas fa-star', 'unstar' => $i > $ratingStar])></i>
                                            @endforeach
                                        </div>

                                        @if ($content = $testimonial->content)
                                            <div class="testimonial-content">
                                                <p class="truncate-3-custom">{!! BaseHelper::clean($content) !!}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="testimonial__nav-four">
                            <div class="testimonial-two-button-prev"><i class="flaticon-right-arrow"></i></div>
                            <div class="testimonial-two-button-next"><i class="flaticon-right-arrow"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
