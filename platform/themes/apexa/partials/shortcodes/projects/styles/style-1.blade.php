<section class="project-area shortcode-projects shortcode-projects-style-1" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7">
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
    </div>
    <div class="project-item-wrap">
        <div class="container custom-container-two">
            <div class="row">
                @foreach($projects as $project)
                    <div class="col-xl-3 col-md-6">
                        <div class="project-item">
                            <div class="project-thumb">
                                <a href="{{ $project->url }}">
                                    {{ RvMedia::image($project->image, $project->name, 'medium-square') }}
                                </a>
                            </div>
                            <div class="project-content">
                                <div class="left-side-content">
                                    <h4 class="title">
                                        <a class="truncate-1-custom" title="{{ $project->name }}" href="{{ $project->url }}">{{ $project->name }}</a>
                                    </h4>

                                    @if ($category = $project->getMetaData('category', true))
                                        <span>{!! BaseHelper::clean($category) !!}</span>
                                    @endif
                                </div>
                                <div class="link-arrow">
                                    <a href="{{ $project->url }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="project-content-bottom">
                        @if ($description = $shortcode->description)
                            <p>{!! BaseHelper::clean($description) !!}</p>
                        @endif

                        @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                            <a href="{{ $buttonUrl }}" class="btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
