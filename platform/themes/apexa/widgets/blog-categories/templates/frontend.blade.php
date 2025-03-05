@if ($categories->isNotEmpty())
    <div class="sidebar__widget widget-blog-categories">
        @if ($title = Arr::get($config, 'title'))
            <h4 class="sidebar__widget-title">{!! BaseHelper::clean($title) !!}</h4>
        @endif
        <div class="sidebar__cat-list">
            <ul class="list-wrap">
                @foreach($categories as $category)
                    <li>
                        <a class="truncate-1-custom" title="{{ $category->name }}" href="{{ $category->url }}">
                            <i class="flaticon-arrow-button"></i>{{ $category->name }} ({{ number_format($category->posts_count) }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
