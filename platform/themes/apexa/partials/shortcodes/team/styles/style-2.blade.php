<section class="shortcode-team shortcode-team-style-2 team__area-two" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                {!! Theme::partial('shortcodes.team.partials.header', ['shortcode' => $shortcode, 'wrapperClass' => 'text-center']) !!}
            </div>
        </div>
        <div class="row justify-content-center gutter-24">
            @foreach($teams as $team)
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="team__item-two shine-animate-item">
                        <div class="team__thumb-two shine-animate">
                            {{ RvMedia::image($team->photo, $team->name) }}
                        </div>
                        <div class="team__content-two">
                            <h4 class="title"><a href="{{ $team->url }}">{{ $team->name }}</a></h4>
                            @if ($title = $team->title)
                                <span>{{ $title }}</span>
                            @endif
                            <div class="team__social-two">
                                {!! Theme::partial('shortcodes.team.partials.socials', compact('team')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
