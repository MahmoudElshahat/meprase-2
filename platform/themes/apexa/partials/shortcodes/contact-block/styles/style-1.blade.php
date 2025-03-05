<section
    class="shortcode-contact-block shortcode-contact-block-style-1 request-area request-bg"
    @style($variablesStyle)
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="request-content text-center tg-heading-subheading animation-style3">
                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                    <div class="content-bottom">
                        @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                            <a href="{{ $buttonUrl }}" class="btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
                        @endif

                        <div class="content-right">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
