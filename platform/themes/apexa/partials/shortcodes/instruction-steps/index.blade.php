@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

<section class="steps__area-seven shortcode-instruction-steps" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-30">
                @if ($title = $shortcode->title)
                    <h3 class="text-capitalize mw-460"> {!! BaseHelper::clean($title) !!}</h3>
                @endif
            </div>

            @if ($description = $shortcode->description)
                <div class="col-lg-6 mb-30">
                    <p> {!! BaseHelper::clean($description) !!}</p>
                </div>
            @endif
        </div>
        <div class="row mt-30">
            @foreach($tabs as $item)
                @continue(! $title = Arr::get($item, 'title'))

                <div class="col-lg-4 mb-40">
                    <div class="card-step">
                        <div class="card-icon">
                            @if($iconImage = Arr::get($item, 'icon_image'))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = Arr::get($item, 'icon'))
                                <x-core::icon :name="$icon"/>
                            @endif
                        </div>
                        <div class="card-info">
                            <h5>{!! BaseHelper::clean($title) !!}</h5>

                            @if ($description = Arr::get($item, 'description'))
                                <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif

                            @if (($buttonLabel = Arr::get($item, 'button_label')) && ($buttonUrl = Arr::get($item, 'button_url')))
                                <a href="{{ $buttonUrl }}" class="link-readmore">
                                    {!! BaseHelper::clean($buttonLabel) !!}
                                    <svg width="24" height="12" viewBox="0 0 24 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M23.781 6.44186L17.781 11.4419C17.7118 11.5016 17.6291 11.5492 17.5376 11.5819C17.4461 11.6147 17.3476 11.6319 17.2481 11.6326C17.1485 11.6334 17.0497 11.6176 16.9575 11.5861C16.8654 11.5547 16.7816 11.5083 16.7112 11.4496C16.6408 11.3909 16.5851 11.3211 16.5474 11.2443C16.5097 11.1675 16.4907 11.0852 16.4916 11.0022C16.4924 10.9193 16.5131 10.8372 16.5524 10.761C16.5917 10.6847 16.6489 10.6158 16.7205 10.5581L21.4403 6.62499H0.75C0.551088 6.62499 0.360322 6.55914 0.21967 6.44193C0.0790176 6.32472 0 6.16575 0 5.99999C0 5.83423 0.0790176 5.67526 0.21967 5.55805C0.360322 5.44084 0.551088 5.37499 0.75 5.37499H21.4403L16.7205 1.44186C16.6489 1.38421 16.5917 1.31524 16.5524 1.23899C16.5131 1.16274 16.4924 1.08073 16.4916 0.997741C16.4907 0.914753 16.5097 0.832454 16.5474 0.755643C16.5851 0.678833 16.6408 0.609051 16.7112 0.550368C16.7816 0.491685 16.8654 0.445277 16.9575 0.413851C17.0497 0.382425 17.1485 0.366612 17.2481 0.367333C17.3476 0.368054 17.4461 0.385296 17.5376 0.418051C17.6291 0.450807 17.7118 0.498421 17.781 0.558115L23.781 5.55812C23.9216 5.67532 24.0006 5.83426 24.0006 5.99999C24.0006 6.16572 23.9216 6.32466 23.781 6.44186Z"
                                                fill="white" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>