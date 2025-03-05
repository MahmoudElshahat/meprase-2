<div class="col-xl-3 col-lg-4 col-md-6">
    <div class="footer-widget">
        @if ($title = Arr::get($config, 'title'))
            <h4 class="fw-title">{!! BaseHelper::clean($title) !!}</h4>
        @endif

        @if ($galleries->isNotEmpty())
            <div class="footer-instagram">
                <ul class="list-wrap">
                    @foreach($galleries as $gallery)
                        <li>
                            <a href="{{ $gallery->url }}">
                                {{ RvMedia::image($gallery->image, $gallery->name, 'thumb') }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
