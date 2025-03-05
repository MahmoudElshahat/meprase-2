@if (($quantity = Arr::get($config, 'quantity')) > 0)
    @php
        $alignment = Arr::get($config, 'alignment', 'start');
    @endphp

    <ul class="tg-header__top-info left-side list-wrap justify-content-{{ $alignment }}">
        @foreach(range(1, $quantity) as $i)
            @continue(! ($title = Arr::get($config, "title_$i")))

            <li>
                @if ($iconImage = Arr::get($config, "icon_image_$i"))
                    {{ RvMedia::image($iconImage, $title, attributes: ['width' => 24, 'height' => 24]) }}
                @elseif( $icon = Arr::get($config, "icon_$i"))
                    <x-core::icon :name="$icon"/>
                @endif
                <a href="{{ Arr::get($config, "url_$i") }}">{!! BaseHelper::clean($title) !!}</a>
            </li>
        @endforeach
    </ul>
@endif
