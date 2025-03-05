@php
    $logo = theme_option('logo');

    $height = theme_option('logo_height', 25);
    $attributes = [
        'style' => sprintf('height: %s', is_numeric($height) ? "{$height}px" : $height),
        'loading' => false,
    ];

    $wrapperClass ??= null;
@endphp

@if ($logo)
    <div @class(['logo', $wrapperClass])>

        <a href="{{ BaseHelper::getHomepageUrl() }}">
            {{ Theme::getLogoImage() }}
        </a>
    </div>
@endif
