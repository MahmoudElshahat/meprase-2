@php
    $style = Arr::get($config, 'style');
    $style = in_array($style, ['style-1', 'style-2', 'style-3']) ? $style : 'style-1';
@endphp

@include(Theme::getThemeNamespace('widgets.site-information.templates.styles.' . $style))
