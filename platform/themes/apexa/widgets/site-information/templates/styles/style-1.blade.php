@if (($quantity = Arr::get($config, 'quantity')) > 0)
    <div class="offCanvas__side-info mb-30 widget-information widget-information-style-1">
        @foreach(range(1, $quantity) as $i)
            <div class="contact-list mb-30">
                @if ($title = Arr::get($config, "title_$i"))
                    <h4>{!! BaseHelper::clean($title) !!}</h4>
                @endif

                @if ($description = Arr::get($config, "description_$i"))
                    <p>{!! BaseHelper::clean($description) !!}</p>
                @endif
            </div>
        @endforeach
    </div>
@endif

@if (Arr::get($config, 'display_social_links') && ($items = Theme::getSocialLinks()))
    <div class="offCanvas__social-icon mt-30">
        @foreach($items as $item)
            <a title="{{ $item->getName() }}" href="{{ $item->getUrl() }}">
                {!! $item->getIconHtml() !!}
            </a>
        @endforeach
    </div>
@endif
