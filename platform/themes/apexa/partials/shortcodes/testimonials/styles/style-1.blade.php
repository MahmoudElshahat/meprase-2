<section class="shortcode-testimonials shortcode-testimonials-style-1 testimonial-area" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 order-0 order-lg-2">
                <div class="swiper-container testimonial-active">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-info">
                                        @if ($name = $testimonial->name)
                                            <h4 class="title">{!! BaseHelper::clean($name) !!}</h4>
                                        @endif

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
                                            <p>{!! BaseHelper::clean($content) !!}</p>
                                            <div class="icon"><i class="fas fa-quote-right"></i></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="testimonial-slider-dot">
                    <div class="swiper testimonial-nav">
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
            </div>
            <div class="col-lg-6 col-md-8">
                @if ($image = $shortcode->image)
                    <div class="testimonial-img-wrap">
                        {{ RvMedia::image($image, 'testimonial-image') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
