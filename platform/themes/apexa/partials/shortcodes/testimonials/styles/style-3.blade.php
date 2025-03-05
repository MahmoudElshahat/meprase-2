<section class="testimonials__area-home8 shortcode-testimonials shortcode-testimonials-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-md-6 mb-50">
                <div class="section-title tg-heading-subheading animation-style3">
                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    @endif
                </div>
            </div>
            <div class="col-xl-5 col-md-6 mb-50">
                <div class="box-button-slider-right text-end">
                    <div class="testimonial__nav-four">
                        <div class="testimonial-two-button-prev button-swiper-testimonial-prev"><i class="flaticon-right-arrow"></i></div>
                        <div class="testimonial-two-button-next button-swiper-testimonial-next"><i class="flaticon-right-arrow"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-slide-testimonials">
            <div class="swiper-container testiminials-active-2">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="card-testimonials">
                                @if ($image = $testimonial->image)
                                    <div class="card-image">
                                        {{ RvMedia::image($image, $testimonial->name) }}
                                    </div>
                                @endif
                                <div class="card-info">
                                    <span class="quote-icon">
                                        <svg width="43" height="32" viewBox="0 0 43 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.21429 18.2H1V1H17.4286V18.9725L11.6564 31H4.66053L10.1158 19.6327L10.8034 18.2H9.21429ZM33.7857 18.2H25.5714V1H42V18.9725L36.2279 31H29.232L34.6873 19.6327L35.3748 18.2H33.7857Z" fill="#B8B9DA" stroke="white" stroke-width="2"/>
                                        </svg>
                                    </span>

                                @if ($company = $testimonial->company)
                                        <p class="card-position">{!! BaseHelper::clean($company) !!}</p>
                                    @endif

                                    <div class="rates-review testimonial__rating">
                                        @php
                                            $ratingStar = round((int) $testimonial->getMetaData('rating_star', true))
                                        @endphp

                                        @foreach(range(1, 5) as $i)
                                            <i @class(['fas fa-star', 'unstar' => $i > $ratingStar])></i>
                                        @endforeach
                                    </div>

                                    @if ($content = $testimonial->content)
                                        <div class="card-comment">
                                            <p class="truncate-3-custom">{!! BaseHelper::clean($content) !!}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
