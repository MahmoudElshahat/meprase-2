@php
    $style = $shortcode->style;
    $style = $style ? (in_array($style, array_map(function ($index) {
        return "style-$index";
    }, range(1, 16))) ? $style : 'style-1') : null;

    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

{!! Theme::partial("shortcodes.about-us-information.styles.$style", compact('shortcode', 'tabs', 'variablesStyle')) !!}
