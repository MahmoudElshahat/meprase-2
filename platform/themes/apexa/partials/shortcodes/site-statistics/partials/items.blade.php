@foreach($tabs as $tab)
    @continue(! ($data = Arr::get($tab, 'data')))

    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="counter-item">
            @if ($image = Arr::get($tab, 'image'))
                <div class="icon">
                    {{ RvMedia::image($image, Arr::get($tab, 'title')) }}
                </div>
            @endif

            <div class="content">
                <h2 class="count"><span class="odometer" data-count="{{ $data }}"></span>{{ Arr::get($tab, 'unit') }}</h2>
                @if ($title = Arr::get($tab, 'title'))
                    {!! BaseHelper::clean($title) !!}
                @endif
            </div>
        </div>
    </div>
@endforeach
