<div class="brand-area"
    @style(["background-color: $shortcode->background_color" => $shortcode->background_color])
>
    <div class="container">
        @if ($title = $shortcode->title)
            <div class="row">
                <div class="col-12">
                    <div class="brand__content tg-heading-subheading animation-style3">
                        <h2 class="title tg-element-title">
                            {!! BaseHelper::clean($title) !!}
                        </h2>
                    </div>
                </div>
            </div>
        @endif

        <div class="swiper-container brand-active">
            <div class="swiper-wrapper">
                @foreach ($tabs as $tab)
                    @continue(! $image = Arr::get($tab, 'image'))
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <a title="{{ $name = Arr::get($tab, 'name') }}" href="{{ Arr::get($tab, 'url') }}">
                                {{ RvMedia::image($image, $name) }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
