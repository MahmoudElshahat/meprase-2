@php
    $bgImage = Theme::get('breadcrumb_background_image') ?: theme_option('breadcrumb_background_image');
    $bgColor = Theme::get('breadcrumb_background_color') ?: theme_option('breadcrumb_background_color');
    $textColor = Theme::get('breadcrumb_text_color') ?: theme_option('breadcrumb_text_color');
    $height = Theme::get('breadcrumb_height') ?: theme_option('breadcrumb_height');
    $height = (int) $height ? $height . 'px' : 'auto';
    $hasTextColor = $textColor && $textColor !== 'transparent';
@endphp

@if ($pageTitle = Theme::get('pageTitle'))
    <section class="breadcrumb__area breadcrumb__bg" @if($bgImage) data-background="{{ RvMedia::getImageUrl($bgImage) }}" @endif
        @style([
            '--breadcrumb-bg-color: ' . $bgColor => $bgColor,
            '--breadcrumb-txt-color: ' . $textColor => $hasTextColor,
            '--breadcrumb-height: ' . $height => $height,
        ])
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">{!! BaseHelper::clean($pageTitle) !!}</h2>
                        @if (Theme::breadcrumb()->enabled())
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @foreach (Theme::breadcrumb()->getCrumbs() as $crumb)
                                        @if (! $loop->last)
                                            <li class="breadcrumb-item">
                                                <a href="{{ $crumb['url'] }}" title="{{ $crumb['label'] }}">
                                                    {{ $crumb['label'] }}
                                                </a>
                                            </li>
                                        @else
                                            <li class="breadcrumb-item active">{{ $crumb['label'] }}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
