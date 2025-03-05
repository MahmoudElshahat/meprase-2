@php
    $featuredList =  Shortcode::fields()->getTabsData(['title'], $shortcode);
@endphp

<div class="services__details-inner shortcode-content-featured">
    <div class="row gutter-24">
        @if ($image = $shortcode->image)
            <div class="col-44">
                <div class="services__details-inner-img">
                    {{ RvMedia::image($image, 'content-featured') }}
                </div>
            </div>
        @endif

        <div class="col-56">
            <div class="services__details-inner-content">
                @if ($title = $shortcode->title)
                    <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>
                @endif

                @if ($description = $shortcode->description)
                    <p>{!! BaseHelper::clean($description) !!}</p>
                @endif

                @if ($featuredList)
                    <div class="about__list-box">
                        <ul class="list-wrap">
                            @foreach($featuredList as $featured)
                                @continue(! $title = Arr::get($featured, 'title'))
                                <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
