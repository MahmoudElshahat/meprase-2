<ul {!! $options !!}>
    @foreach ($menu_nodes->loadMissing('metadata') as $key => $row)
        @php
            $hasChild = $row->has_child;
        @endphp

        <li @class(['active' => false, 'menu-item-has-children' => $hasChild])>
            <a href="{{ url($row->url) }}" @if ($row->target !== '_self') target="{{ $row->target }}" @endif>
                @if ($iconImage = $row->getMetaData('icon_image', true))
                    <img src="{{ RvMedia::getImageUrl($iconImage) }}" alt="{{ $row->title }}" width="12" height="12"/>
                @elseif ($row->icon_font)
                    <i class="{{ trim($row->icon_font) }}"></i>
                @endif

                {{ $row->title }}
            </a>

            @if ($hasChild)
                {!! Menu::generateMenu(['menu' => $menu, 'menu_nodes' => $row->child, 'view' => 'main-menu', 'options' => ['class' => 'sub-menu']]) !!}
            @endif
        </li>
    @endforeach
</ul>
