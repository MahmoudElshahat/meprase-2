<section class="our_team__area-six">
    <div class="container">
        {!! Theme::partial('shortcodes.team.partials.header', ['shortcode' => $shortcode, 'wrapperClass' => 'text-center']) !!}
        <div class="row">
            @foreach($teams as $team)
                <div class="col-lg-6">
                    <div class="card-team-area-six">
                        <div class="card-image">
                            {{ RvMedia::image($team->photo, $team->name) }}
                            <a href="#" class="btn-share">
                                <x-core::icon name="ti ti-share"/>
                            </a>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a href="{{ $team->url }}">{{ $team->name }}</a>
                                @if ($title = $team->title)
                                    <p class="card-dept mt-10">{{ $title }}</p>
                                @endif
                            </div>

                            @if ($description = $team->description)
                                <div class="card-desc">
                                    {!! BaseHelper::clean($description) !!}
                                </div>
                            @endif

                            <div class="card-link">
                                <a href="{{ $team->url }}">{{ __('Contact Me') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
            <div class="text-center">
                <a href="{{ $buttonUrl }}" class="btn" data-aos="fade-up" data-aos-delay="600">{!! BaseHelper::clean($buttonLabel) !!}</a>
            </div>
        @endif
    </div>
</section>
