@if ($services->isNotEmpty())
    <div class="sidebar__widget sidebar__widget-two">
        <div class="sidebar__cat-list-two">
            <ul class="list-wrap">
                @foreach($services as $service)
                    <li>
                        <a class="truncate-1-custom" title="{{ $service->name }}" href="{{ $service->url }}">{{ $service->name }} <i class="flaticon-arrow-button"></i></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
