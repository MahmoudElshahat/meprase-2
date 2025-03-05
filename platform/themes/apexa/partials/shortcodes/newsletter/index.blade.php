@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

<section class="call-back-area call-back-area-two shortcode-newsletter" @style($variablesStyle)>
    <div class="container">
        <div class="call-back-wrap">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-5">
                    <div class="call-back-content">
                        @if ($title = $shortcode->title)
                            <div class="section-title white-title mb-10 tg-heading-subheading animation-style3">
                                <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                            </div>
                        @endif

                        @if ($description = $shortcode->description)
                            <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="call-back-form">
                        {!! $form->renderForm() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
