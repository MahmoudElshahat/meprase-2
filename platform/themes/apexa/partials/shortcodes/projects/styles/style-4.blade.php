<section class="project__area-three project__bg-three shortcode-projects shortcode-projects-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container project-active">
                    <div class="swiper-wrapper">
                        @foreach($projects as $project)
                            <div class="swiper-slide">
                                <div class="project__item-three shine-animate-item">
                                    <div class="project__content-three">
                                        @if($category = $project->getMetaData('category', true))
                                            <span>{!! BaseHelper::clean($category) !!}</span>
                                        @endif

                                        <h2 class="title"><a class="truncate-2-custom" title="{{ $project->name }}" href="{{ $project->url }}">{{ $project->name }}</a></h2>

                                        @if ($description = $project->description)
                                            <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                                        @endif

                                        <a href="{{ $project->url }}" class="btn btn-two">{{ __('See Details') }}</a>
                                    </div>

                                    @if ($image = $project->image)
                                        <div class="project__thumb-three shine-animate">
                                            {{ RvMedia::image($image, $project->name) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="project__nav-wrap">
                        <div class="project-button-prev"><i class="flaticon-right-arrow"></i></div>
                        <div class="project-button-next"><i class="flaticon-right-arrow"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
