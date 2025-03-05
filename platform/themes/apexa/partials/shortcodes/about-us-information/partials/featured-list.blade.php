@php
    $itemWrapperClass ??= null;
    $contentWrapperClass ??= null;
    $iconWrapperClass ??= null;
@endphp

<ul class="list-wrap">
    @foreach($tabs as $item)
        @continue(! ($title = Arr::get($item, 'title')))
        <li @class([$itemWrapperClass])>
            <div @class(['icon', $iconWrapperClass])>
                @if($iconImage = Arr::get($item, 'icon_image'))
                    {{ RvMedia::image($iconImage, 'icon') }}
                @elseif($icon = Arr::get($item, 'icon'))
                    <x-core::icon :name="$icon"/>
                @endif
            </div>
            <div @class(['content', $contentWrapperClass])>
                <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>

                @if ($description = Arr::get($item, 'description'))
                    <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                @endif
            </div>
        </li>
    @endforeach
</ul>
