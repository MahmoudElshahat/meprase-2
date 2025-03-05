@php
    $logo = Arr::get($config, 'logo', theme_option('logo'));
@endphp

<div class="col widget-information widget-information-style-2">
    <div class="footer-widget">
        @if($logo)
            <div class="fw-logo mb-25">
                <a href="{{ BaseHelper::getHomepageUrl() }}">
                    {{ RvMedia::image($logo, theme_option('site_title')) }}
                </a>
            </div>
        @endif

        <div class="footer-content">
            @if ($description = Arr::get($config, 'description'))
                <p>{!! BaseHelper::clean($description) !!}</p>
            @endif

            @if (Arr::get($config, 'display_social_links') && ($items = Theme::getSocialLinks()))
                <div class="footer-social">
                    <ul class="list-wrap">
                        @foreach($items as $item)
                            <li>
                                <a title="{{ $item->getName() }}" href="{{ $item->getUrl() }}">
                                    {!! $item->getIconHtml() !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
