<section class="all_services__area-six shortcode-contact-block shortcode-contact-block-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
            @if ($subtitle = $shortcode->subtitle)
                <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
            @endif

            @if ($title = $shortcode->title)
                <h2>{!! BaseHelper::clean($title) !!}</h2>
            @endif

            @if($description = $shortcode->description)
                <p>{!! BaseHelper::clean($description) !!}</p>
            @endif

            @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                <a href="{{ $shortcode->button_url }}" class="btn" data-aos="fade-up" data-aos-delay="600">{!! BaseHelper::clean($buttonLabel) !!}</a>
            @endif
        </div>
    </div>
</section>