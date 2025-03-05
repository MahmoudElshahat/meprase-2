@php
    $style = Arr::get($config, 'style');
    $style = in_array($style, ['style-1', 'style-2']) ? $style : 'style-1';
@endphp

@include(Theme::getThemeNamespace('widgets.social-links.templates.styles.' . $style))
