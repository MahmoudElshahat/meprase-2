@php
    Theme::set('pageTitle', __('Project Details'))
@endphp

<section class="project__details-area">
    <div class="container">
        <div class="project__details-wrap">
            <div class="row">
                <div class="col-12">
                    <div class="project__details-top">
                        <div class="row">
                            <div class="col-70">
                                <div class="project__details-thumb">
                                    {{ RvMedia::image($project->image, $project->name, 'medium-rectangle') }}
                                </div>
                            </div>
                            <div class="col-30">
                                <div class="project__details-info">
                                    <h4 class="title">{{ __('Project Details') }}</h4>
                                    <ul class="list-wrap">
                                        <li><span>{{ __('Name:') }}</span>{{ $project->name }}</li>

                                        @if ($category = $project->getMetaData('category', true))
                                            <li><span>{{ __('Category:') }}</span>{!! BaseHelper::clean($category) !!}</li>
                                        @endif

                                        @if ($author = $project->author)
                                            <li><span>{{ __('Author:') }}</span>{!! BaseHelper::clean($author) !!}</li>
                                        @endif

                                        @if ($client = $project->client)
                                            <li><span>{{ __('Client:') }}</span>{!! BaseHelper::clean($client) !!}</li>
                                        @endif

                                        @if ($place = $project->place)
                                            <li><span>{{ __('Location:') }}</span>{!! BaseHelper::clean($place) !!}</li>
                                        @endif

                                        @if ($socials = \Botble\Theme\Supports\ThemeSupport::getSocialSharingButtons($project->url, SeoHelper::getDescription()))
                                            <li>
                                                <span>{{ __('Share:') }}</span>
                                                <ul class="list-wrap project-social flex-wrap">
                                                    @foreach($socials as $social)
                                                        @php
                                                            $name = Arr::get($social, 'name');
                                                            $backgroundColor = Arr::get($social, 'background_color');
                                                            $color = Arr::get($social, 'color');
                                                        @endphp

                                                        <li>
                                                            <a
                                                                aria-label="{{ __('Share on :social', ['social' => $name]) }}"
                                                                @style(["background-color: {$backgroundColor}" => $backgroundColor, "color: {$color}" => $color])
                                                                href="{{ Arr::get($social, 'url') }}"
                                                                target="_blank"
                                                            >
                                                                {!! Arr::get($social, 'icon') !!}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project__details-content">
                        <h2 class="title">{{ $project->name }}</h2>
                        @if ($description = $project->description)
                            <p>{!! BaseHelper::clean($description) !!}</p>
                        @endif

                        <div class="ck-content">
                            {!! BaseHelper::clean($project->content) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
