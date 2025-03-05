<div @class(['section-title mb-50 tg-heading-subheading animation-style3', $wrapperClass ?? null])>
    @if ($subtitle = $shortcode->subtitle)
        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
    @endif

    @if ($title = $shortcode->title)
        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
    @endif
</div>
