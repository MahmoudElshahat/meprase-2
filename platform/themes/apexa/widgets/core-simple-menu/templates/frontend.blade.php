<div @if(Theme::get('site-information-style-3')) class="col-xl-2 col-lg-4 col-md-6 col-sm-6" @else class="col" @endif>
    <div>
        @if ($title = Arr::get($config, 'name'))
            <h4 class="fw-title">{!! BaseHelper::clean($title) !!}</h4>
        @endif
        <div class="footer-info-list">
            <ul class="list-wrap">
                @foreach($items as $item)
                    @if (($label = $item->label) && ($url = $item->url))
                        <li>
                            @if ($iconImage = $item->icon_image)
                                <div class="icon">
                                    {{ RvMedia::image($iconImage, $label, attributes: ['width' => 24, 'height' => 24]) }}
                                </div>
                            @elseif($icon = $item->icon)
                                <div class="icon">
                                    <x-core::icon :name="$icon"/>
                                </div>
                            @endif

                            <div class="content">
                                <a
                                    @if($item->is_open_new_tab) target="_blank" @endif  @if($attrs = $item->attributes) {{ $attrs }} @endif href="{{ $url }}">{!! BaseHelper::clean($label) !!}
                                </a>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
