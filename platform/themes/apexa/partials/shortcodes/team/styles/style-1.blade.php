<section class="shortcode-team shortcode-team-style-1 team-area pt-90 pb-90" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-6">
                {!! Theme::partial('shortcodes.team.partials.header', compact('shortcode')) !!}
            </div>

            @if ($description = $shortcode->description)
                <div class="col-xl-5 col-lg-6">
                    <div class="section-content">
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    </div>
                </div>
            @endif
        </div>
        <div class="team-item-wrap">
            <div class="row justify-content-center">
                @foreach($teams as $team)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team-item">
                            <div class="team-thumb">
                                {{ RvMedia::image($team->photo, $team->name) }}
                                <div class="team-social">
                                    <div class="social-toggle-icon">
                                        <i class="fas fa-share-alt"></i>
                                    </div>
                                    {!! Theme::partial('shortcodes.team.partials.socials', compact('team')) !!}
                                </div>
                            </div>
                            <div class="team-content">
                                <h4 class="title"><a href="{{ $team->url }}">{{ $team->name }}</a></h4>
                                @if ($title = $team->title)
                                    <span>{{ $title }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
