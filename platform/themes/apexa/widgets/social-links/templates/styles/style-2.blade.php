@if ($items = Theme::getSocialLinks())
    <div class="col-lg-6">
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
    </div>
@endif