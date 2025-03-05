@php
    Theme::set('site-information-style-3', true);
    $logo = Arr::get($config, 'logo', theme_option('logo'));
@endphp

<div class="col widget-information widget-information-style-3">
    <div class="footer-widget">
        <div class="footer__content-two">
            @if($logo)
                <div class="fw-logo mb-25">
                    <a href="{{ BaseHelper::getHomepageUrl() }}">
                        {{ RvMedia::image($logo, theme_option('site_title')) }}
                    </a>
                </div>
            @endif

            @if ($description = Arr::get($config, 'description'))
                <p>{!! BaseHelper::clean($description) !!}</p>
            @endif

            <div class="footer-info-list footer-info-two">
                <ul class="list-wrap">
                    @foreach(range(1, Arr::get($config, 'quantity', 1)) as $i)
                        @continue(!$title = Arr::get($config, "title_$i"))
                        <li>
                            <div class="icon">
                                @if($iconImage = Arr::get($config, "icon_image_$i"))
                                    {{ RvMedia::image($iconImage, 'icon') }}
                                @elseif ($icon = Arr::get($config, "icon_$i"))
                                    <x-core::icon :name="$icon"/>
                                @endif
                            </div>

                            <div class="content">
                                {!! BaseHelper::clean($title) !!}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

