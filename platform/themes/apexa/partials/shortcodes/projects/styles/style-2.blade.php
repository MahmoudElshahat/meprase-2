<section class="project__area shortcode-projects shortcode-projects-style-2" @style($variablesStyle)>
    <div class="container-fluid p-0">
        <div class="swiper-container project-active-two">
            <div class="swiper-wrapper">
                @foreach($projects as $project)
                    <div class="swiper-slide">
                        <div class="project__item-four">
                            <div class="project__thumb-four">
                                <a href="{{ $project->url }}">
                                    {{ RvMedia::image($project->image, $project->name, 'medium-square') }}
                                </a>
                            </div>
                            <div class="project__content-four">
                                <div class="left-content">
                                    <h4 class="title">
                                        <a class="truncate-1-custom" title="{{ $project->name }}" href="{{ $project->url }}">{{ $project->name }}</a>
                                    </h4>

                                    @if ($category = $project->getMetaData('category', true))
                                        <span>{!! BaseHelper::clean($category) !!}</span>
                                    @endif
                                </div>
                                <a href="{{ $project->url }}" class="right-arrow"><i class="flaticon-arrow-button"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
