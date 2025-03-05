@if ($data = theme_option('header_action_buttons'))
    @php
        $data = json_decode($data, true);
    @endphp

    @foreach($data as $item)
        @php
            $item = collect($item)->pluck('value', 'key');
            $label = $item->get('label');
            $url = $item->get('url');
        @endphp

        @if ($label && $url)
            @php
                $icon = $item->get('icon');
                $iconImage = $item->get('icon_image');
            @endphp

            <li @class(['header-btn', 'header-btn-two' => $loop->first && count($data) > 1, $wrapperClass ?? null])>
                <a href="{{ $url }}" @class(['btn', 'border-btn' => $loop->first && count($data) > 1])>
                    @if ($iconImage)
                        {{ RvMedia::image($iconImage, 'header action icon', attributes: ['width' => 24, 'height' => 24]) }}
                    @elseif ($icon)
                        <x-core::icon :name="$icon"/>
                    @endif

                    <span @class(['ms-2' => $iconImage || $icon])>
                        {!! BaseHelper::clean($label) !!}
                    </span>
                </a>
            </li>
        @endif
    @endforeach
@endif
