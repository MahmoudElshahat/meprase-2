@if ($tags->isNotEmpty())
    <div class="sidebar__widget widget-blog-tags">
        @if ($name = Arr::get($config, 'name'))
            <h4 class="sidebar__widget-title">Tags</h4>
        @endif
        <div class="sidebar__tag-list">
            <ul class="list-wrap">
                @foreach($tags as $tag)
                    <li><a href="{{ $tag->url }}" title="{{ $tag->name }}" class="tag">#{{ $tag->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
