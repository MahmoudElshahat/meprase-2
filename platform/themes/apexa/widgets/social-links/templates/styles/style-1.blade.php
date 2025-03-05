@if ($items = Theme::getSocialLinks())
    <div class="offCanvas__social-icon mt-30">
        @foreach($items as $item)
            <a title="{{ $item->getName() }}" href="{{ $item->getUrl() }}">
                {!! $item->getIconHtml() !!}
            </a>
        @endforeach
    </div>
@endif
