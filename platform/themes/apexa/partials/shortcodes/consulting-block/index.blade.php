@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;
    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

<section class="consulting-area shortcode-consulting-block" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="consulting-inner-wrap shine-animate-item">
                    <div class="consulting-content">

                        @if (($dataCount = $shortcode->data_count) && ($dataCountDescription = $shortcode->data_count_description))
                            <div class="content-left">
                                <h2 class="title">{!! BaseHelper::clean($dataCount) !!}</h2>
                                <span> {!! BaseHelper::clean($dataCountDescription) !!} </span>
                            </div>
                        @endif

                        <div class="content-right">
                            @if($title = $shortcode->title)
                                <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                            @endif

                            @if ($description = $shortcode->description)
                                <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif
                        </div>
                    </div>

                    @if ($image = $shortcode->image)
                        <div class="consulting-img shine-animate">
                            {{ RvMedia::image($image, 'Consulting Image') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>