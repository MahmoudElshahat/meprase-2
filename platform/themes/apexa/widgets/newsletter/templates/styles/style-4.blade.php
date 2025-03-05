<div class="col-lg-5 col-md-8 widget-newsletter widget-newsletter-style-4" @style($variablesStyle)>
    <div class="footer-widget">
        <div class="footer__newsletter-three">
            @if ($title = Arr::get($config, 'title'))
                <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            {!! $form->renderForm() !!}
        </div>

        @if (Arr::get($config, 'display_social_links') && $items = Theme::getSocialLinks())
            <div class="footer__social-three">
                <span class="title">{{ __('Follow Us on:') }}</span>
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