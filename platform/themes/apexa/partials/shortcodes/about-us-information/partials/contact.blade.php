@if (($contactTitle = $shortcode->contact_title))
    <div class="about__phone">
        @if ($icon = $shortcode->contact_icon)
            <div class="icon">
                <x-core::icon :name="$icon" />
            </div>
        @endif

        <div class="content">
            @if ($contactSubtitle = $shortcode->contact_subtitle)
                <span>{!! BaseHelper::clean($contactSubtitle) !!}</span>
            @endif

            <a href="{{ $shortcode->contact_url }}">{!! BaseHelper::clean($contactTitle) !!}</a>
        </div>
    </div>
@endif
