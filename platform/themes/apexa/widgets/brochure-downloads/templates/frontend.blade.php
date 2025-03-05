<div class="sidebar__widget brochure-downloads-widget">
    @if ($title = Arr::get($config, 'title'))
        <h4 class="sidebar__widget-title">{!! BaseHelper::clean($title) !!}</h4>
    @endif

    <div class="sidebar__brochure">
        @if ($description = Arr::get($config, 'description'))
            <p>{!! BaseHelper::clean($description) !!}</p>
        @endif

        @foreach($fileData as $file)
            <a href="{{ Arr::get($file, 'url') }}">
                <x-core::icon :name="Arr::get($file, 'icon')"/>
                {!! BaseHelper::clean(Arr::get($file, 'name')) !!}
            </a>
        @endforeach
    </div>
</div>