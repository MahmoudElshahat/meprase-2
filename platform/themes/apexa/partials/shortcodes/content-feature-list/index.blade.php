@php
    $items =  Shortcode::fields()->getTabsData(['title', 'description', 'icon', 'icon_image'], $shortcode);
@endphp

@if(count($items))
    <div class="services__details-list shortcode-content-feature-list">
        <div class="row">
            @foreach($items as $item)
                @continue(! $title = Arr::get($item, 'title'))
                <div class="col-md-6">
                    <div class="services__details-list-box feature-item">
                        <div class="icon feature-icon">
                            @if ($iconImage = Arr::get($item, 'icon_image'))
                                {{ RvMedia::image($iconImage, $title, 'thumb') }}
                            @elseif($icon = Arr::get($item, 'icon'))
                                <x-core::icon :name="$icon"/>
                            @endif
                        </div>
                        <div class="content">
                            <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>
                            @if ($description = Arr::get($item, 'description'))
                                <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
