<div class="footer__newsletter-two widget-newsletter widget-newsletter-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="footer__newsletter-inner">
            @if ($title = Arr::get($config, 'title'))
                <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
            @endif

            {!! $form->renderForm() !!}

            @if (Arr::get($config, 'display_social_links') && $items = Theme::getSocialLinks())
                <div class="footer__social-two">
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