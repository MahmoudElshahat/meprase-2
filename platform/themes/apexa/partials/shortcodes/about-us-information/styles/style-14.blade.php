<section class="marketing_expert__area_six shortcode-about-us-information shortcode-about-us-information-style-14" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-30">
                @if ($title = $shortcode->title)
                    <h1 class="title mb-15">{!! BaseHelper::clean($title) !!}</h1>
                @endif

                @if ($description = $shortcode->description)
                    <p class="mb-45">{!! BaseHelper::clean($description) !!}</p>
                @endif

                @if (count($tabs))
                    <div class="about__list-box mb-35">
                        <ul class="list-wrap">
                            @foreach($tabs as $item)
                                @continue(! ($title = Arr::get($item, 'title')))
                                <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                    <a href="{{ $buttonUrl }}" class="btn btn-two">{!! BaseHelper::clean($buttonLabel) !!}</a>
                @endif
            </div>

            @if ($image = $shortcode->image)
                <div class="col-lg-7 mb-30 position-relative">
                    <div class="box-video">
                        {{ RvMedia::image($image, 'marketing-expert') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>