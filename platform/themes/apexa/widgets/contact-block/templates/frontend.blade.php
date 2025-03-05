@php
    $backgroundColor = Arr::get($config, 'background_color');
@endphp

<div class="sidebar__widget sidebar__widget-two">
    <div class="sidebar__contact" @style(["background-color: $backgroundColor" => $backgroundColor])>
        @if ($title = Arr::get($config, 'title'))
            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
        @endif

        @if ($phoneNumber = Arr::get($config, 'phone_number'))
            <a href="tel:{{ $phoneNumber }}" class="btn"><i class="flaticon-phone-call"></i>{{ $phoneNumber }}</a>
        @endif
    </div>
</div>
