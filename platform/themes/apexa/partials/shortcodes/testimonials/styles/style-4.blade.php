<section
    class="testimonial__area-three testimonial__bg shortcode-testimonials shortcode-testimonials-style-4"
    @style($variablesStyle)
>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-8">
                @if ($image = $shortcode->image)
                    <div class="testimonial__img-wrap-two">
                        {{ RvMedia::image($image, 'testimonial-image') }}
                    </div>
                @endif
            </div>
            <div class="col-lg-7">
                <div class="testimonial__item-wrap">
                    <div class="swiper-container testimonial-active-two">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial__item-three">
                                        <div class="testimonial__rating testimonial__rating-two">
                                            @php
                                                $ratingStar = round((int) $testimonial->getMetaData('rating_star', true))
                                            @endphp

                                            @foreach(range(1, 5) as $i)
                                                <i @class(['fas fa-star', 'unstar' => $i > $ratingStar])></i>
                                            @endforeach
                                        </div>

                                        @if ($content = $testimonial->content)
                                            <p class="truncate-3-custom">{!! BaseHelper::clean($content) !!}</p>
                                        @endif
                                        <div class="testimonial__bottom">
                                            <div class="testimonial__info-three">
                                                <h4 class="title">{{ $testimonial->name }}</h4>

                                                @if($company = $testimonial->company)
                                                    <span>{!! BaseHelper::clean($company) !!}</span>
                                                @endif
                                            </div>
                                            <div class="testimonial__icon">
                                                <svg width="81" height="57" viewBox="0 0 81 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.3571 33.2H1V1H33.7143V33.9608L22.529 56H7.41465L18.2489 34.6526L18.9861 33.2H17.3571ZM63.6429 33.2H47.2857V1H80V33.9608L68.8147 56H53.7004L64.5346 34.6526L65.2718 33.2H63.6429Z" stroke="#E2E2E2" stroke-width="2"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="testimonial__nav-two">
                            <div class="testimonial-button-prev"><i class="flaticon-right-arrow"></i></div>
                            <div class="testimonial-button-next"><i class="flaticon-right-arrow"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
