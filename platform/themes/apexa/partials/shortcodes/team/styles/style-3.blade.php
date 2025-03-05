<section class="shortcode-team shortcode-team-style-3 team__area-three" @style($variablesStyle)>
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
        <div class="row gutter-24 justify-content-center">
            @foreach($teams as $team)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="team__item-three shine-animate-item">
                        <div class="team__thumb-three shine-animate">
                            {{ RvMedia::image($team->photo, $team->name) }}
                        </div>
                        <div class="team__content-three">
                            <h4 class="title"><a href="{{ $team->url }}">{{ $team->name }}</a></h4>
                            @if ($title = $team->title)
                                <span>{{ $title }}</span>
                            @endif
                        </div>
                        <div class="team-social team__social-three">
                            {!! Theme::partial('shortcodes.team.partials.socials', compact('team')) !!}
                            <div class="social-toggle-icon">
                                <i class="fas fa-share-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
