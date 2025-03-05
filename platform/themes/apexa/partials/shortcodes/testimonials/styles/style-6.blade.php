<section class="testimonials_area-seven shortcode-testimonials shortcode-testimonials-style-6" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="slider_testimonial_home7">
            <span class="quote-review">
                <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M80 40C80 17.9086 62.0914 0 40 0H0V80H80V40Z" fill="#F7A400"/>
                    <path d="M27.2143 44.2H19V27H35.4286V44.9725L29.6564 57H22.6605L28.1158 45.6327L28.8034 44.2H27.2143ZM51.7857 44.2H43.5714V27H60V44.9725L54.2279 57H47.232L52.6873 45.6327L53.3748 44.2H51.7857Z" stroke="white" stroke-width="2"/>
                </svg>
            </span>
            <div class="swiper-container slider_baner__active">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                        <div class="swiper-slide slide__home7">
                            <div class="item-testimonial">
                                <div class="item-testimonial-left">
                                    <div class="author-testimonial">
                                        @if ($image = $testimonial->image)
                                            {{ RvMedia::image($image, $testimonial->name, 'thumb') }}
                                        @endif

                                        <div class="info-author-review">
                                            <strong class="name-review">{{ $testimonial->name }}</strong>

                                            @if ($company = $testimonial->company)
                                                <p class="review-dept">{!! BaseHelper::clean($company) !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if ($content = $testimonial->content)
                                    <div class="item-testimonial-right">
                                        <p>{!! BaseHelper::clean($content) !!}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination swiper-pagination-testimonials"></div>
            </div>
            <div class="testimonial__nav-four">
                <div class="testimonial-two-button-prev button-swiper-prev"><i class="flaticon-right-arrow"></i></div>
                <div class="testimonial-two-button-next button-swiper-next"><i class="flaticon-right-arrow"></i></div>
            </div>
        </div>
    </div>
</section>
