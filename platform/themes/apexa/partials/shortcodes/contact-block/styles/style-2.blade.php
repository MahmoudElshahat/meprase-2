<section
    class="shortcode-contact-block shortcode-contact-block-style-2 request__area-two"
    @style($variablesStyle)
>
    <div class="request__bg-two"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-5 col-lg-6">
                <div class="request__content-two">
                    @if ($title = $shortcode->title)
                        <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    <div class="request__phone">
                        <div class="icon">
                            <i class="flaticon-phone-call"></i>
                        </div>
                        <div class="content">
                            @if ($subtitle = $shortcode->subtitle)
                                <span>{!! BaseHelper::clean($subtitle) !!}</span>
                            @endif

                            @if ($phoneNumber = $shortcode->phone_number)
                                <a href="tel:{{ $phoneNumber }}"> {!! BaseHelper::clean($phoneNumber) !!}</a>
                            @endif
                        </div>
                    </div>
                    @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                        <a href="{{ $buttonUrl }}" class="btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
