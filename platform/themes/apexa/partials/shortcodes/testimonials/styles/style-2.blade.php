<section class="shortcode-testimonials shortcode-testimonials-style-1 testimonial__area-two" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title white-title text-center mb-50 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center gutter-24">
            <div class="col-12">
                <div class="swiper-container testiminials-active">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial__item-two">
                                    @if ($image = $testimonial->image)
                                        <div class="testimonial__avatar">
                                            {{ RvMedia::image($image, $testimonial->name, 'thumb') }}
                                        </div>
                                    @endif

                                    <div class="testimonial__info-two">
                                        @if ($name = $testimonial->name)
                                            <h2 class="title">{{ $name }}</h2>
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
                                        <p class="truncate-3-custom">{!! BaseHelper::clean($content) !!}</p>
                                    @endif

                                    <div class="icon quote-icon">
                                        <svg width="92" height="64" viewBox="0 0 92 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.56291 58.1731C8.19632 60.835 10.1292 64 13.1214 64H23.8429C25.3427 64 26.7164 63.1611 27.4014 61.8269L38.987 39.2601C39.2772 38.6948 39.4286 38.0686 39.4286 37.4332V4C39.4286 1.79086 37.6377 0 35.4286 0H4C1.79086 0 0 1.79086 0 4V34.4C0 36.6091 1.79086 38.4 4 38.4H13.1644C16.1565 38.4 18.0894 41.565 16.7228 44.2269L9.56291 58.1731ZM62.1343 58.1731C60.7677 60.835 62.7006 64 65.6928 64H76.4144C77.9141 64 79.2878 63.1611 79.9728 61.8269L91.5584 39.2601C91.8486 38.6948 92 38.0686 92 37.4332V4C92 1.79086 90.2091 0 88 0H56.5714C54.3623 0 52.5714 1.79086 52.5714 4V34.4C52.5714 36.6091 54.3623 38.4 56.5714 38.4H65.7358C68.728 38.4 70.6608 41.565 69.2942 44.2269L62.1343 58.1731Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
