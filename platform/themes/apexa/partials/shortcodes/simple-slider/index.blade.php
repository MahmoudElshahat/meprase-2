@php
    $style = $shortcode->style;
    $style = $style ? (in_array($style, ['style-1', 'style-2', 'style-3']) ? $style : 'style-1') : null;
@endphp

{!! Theme::partial("shortcodes.simple-slider.styles.$style", compact('shortcode', 'sliders')) !!}
