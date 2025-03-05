@php
    $chunkProjects = $projects->chunk(3);
@endphp

<section class="project__area-two shortcode-projects shortcode-projects-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="section-title mb-50 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>

        @foreach($chunkProjects as $projects)
            <div class="row gutter-24">
                @foreach($projects as $project)
                    @if($loop->last && $loop->index == 1)
                        <div class="col-lg-8">
                            <div class="project__item-two">
                                <div class="project__thumb-two">
                                    {{ RvMedia::image($project->image, $project->name) }}
                                </div>
                                <div class="project__content-two">
                                    <h2 class="title">
                                        <a class="truncate-1-custom" title="{{ $project->name }}" href="{{ $project->url }}">{{ $project->name }}</a>
                                    </h2>

                                    @if ($category = $project->getMetaData('category', true))
                                        <span>{!! BaseHelper::clean($category) !!}</span>
                                    @endif
                                    <div class="link-arrow link-arrow-two">
                                        <a href="{{ $project->url }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27956C17.7117 2.80339 17.4427 2.34761 17.0096 2.17811C16.9477 2.15384 16.8824 2.13551 16.8144 2.12375L6.96087 0.419136C6.4166 0.325033 5.89918 0.689841 5.80497 1.23409C5.71085 1.77828 6.0757 2.29576 6.61988 2.38991L14.0947 3.68293L1.3658 12.6573C0.914426 12.9756 0.806485 13.5994 1.12473 14.0508C1.44298 14.5022 2.06688 14.6101 2.51825 14.2919L15.2471 5.31752L13.954 12.7923C13.8599 13.3365 14.2248 13.854 14.7689 13.9481C15.3132 14.0422 15.8306 13.6774 15.9248 13.1332L17.6293 3.27956Z" fill="currentcolor" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27956C17.7117 2.80339 17.4427 2.34761 17.0096 2.17811C16.9477 2.15384 16.8824 2.13551 16.8144 2.12375L6.96087 0.419136C6.4166 0.325033 5.89918 0.689841 5.80497 1.23409C5.71085 1.77828 6.0757 2.29576 6.61988 2.38991L14.0947 3.68293L1.3658 12.6573C0.914426 12.9756 0.806485 13.5994 1.12473 14.0508C1.44298 14.5022 2.06688 14.6101 2.51825 14.2919L15.2471 5.31752L13.954 12.7923C13.8599 13.3365 14.2248 13.854 14.7689 13.9481C15.3132 14.0422 15.8306 13.6774 15.9248 13.1332L17.6293 3.27956Z" fill="currentcolor" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6">
                            <div class="project__item-two">
                                <div class="project__thumb-two">
                                    {{ RvMedia::image($project->image, $project->name, 'media-square') }}
                                </div>
                                <div class="project__content-two">
                                    <h2 class="title">
                                        <a class="truncate-1-custom" title="{{ $project->name }}" href="{{ $project->url }}">{{ $project->name }}</a>
                                    </h2>

                                    @if ($category = $project->getMetaData('category', true))
                                        <span>{!! BaseHelper::clean($category) !!}</span>
                                    @endif
                                    <div class="link-arrow link-arrow-two">
                                        <a href="{{ $project->url }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27956C17.7117 2.80339 17.4427 2.34761 17.0096 2.17811C16.9477 2.15384 16.8824 2.13551 16.8144 2.12375L6.96087 0.419136C6.4166 0.325033 5.89918 0.689841 5.80497 1.23409C5.71085 1.77828 6.0757 2.29576 6.61988 2.38991L14.0947 3.68293L1.3658 12.6573C0.914426 12.9756 0.806485 13.5994 1.12473 14.0508C1.44298 14.5022 2.06688 14.6101 2.51825 14.2919L15.2471 5.31752L13.954 12.7923C13.8599 13.3365 14.2248 13.854 14.7689 13.9481C15.3132 14.0422 15.8306 13.6774 15.9248 13.1332L17.6293 3.27956Z" fill="currentcolor" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27956C17.7117 2.80339 17.4427 2.34761 17.0096 2.17811C16.9477 2.15384 16.8824 2.13551 16.8144 2.12375L6.96087 0.419136C6.4166 0.325033 5.89918 0.689841 5.80497 1.23409C5.71085 1.77828 6.0757 2.29576 6.61988 2.38991L14.0947 3.68293L1.3658 12.6573C0.914426 12.9756 0.806485 13.5994 1.12473 14.0508C1.44298 14.5022 2.06688 14.6101 2.51825 14.2919L15.2471 5.31752L13.954 12.7923C13.8599 13.3365 14.2248 13.854 14.7689 13.9481C15.3132 14.0422 15.8306 13.6774 15.9248 13.1332L17.6293 3.27956Z" fill="currentcolor" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</section>
