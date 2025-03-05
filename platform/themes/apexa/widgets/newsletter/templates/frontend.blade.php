@php
    $style = Arr::get($config, 'style');
    $style = in_array($style, ['style-1', 'style-2', 'style-3', 'style-4']) ? $style : 'style-1';
    $bgColor = Arr::get($config, 'background_color');
    $bgImage = Arr::get($config, 'background_image');
    $bgImage = $bgImage ? RvMedia::getImageUrl($bgImage) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

@include(Theme::getThemeNamespace('widgets.newsletter.templates.styles.' . $style))
