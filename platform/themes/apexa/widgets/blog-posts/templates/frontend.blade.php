@if ($posts->isNotEmpty())
    <div class="sidebar__widget widget-blog-posts">
        @if($title = Arr::get($config, 'title'))
            <h4 class="sidebar__widget-title">{!! BaseHelper::clean($title) !!}</h4>
        @endif

        <div class="sidebar__post-list">
            @foreach($posts as $post)
                <div class="sidebar__post-item">
                    <div class="sidebar__post-thumb">
                        <a href="{{ $post->url }}">
                            {{ RvMedia::image($post->image, $post->name, 'thumb') }}
                        </a>
                    </div>
                    <div class="sidebar__post-content">
                        <h5 class="title">
                            <a class="truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
                        </h5>
                        <span class="date">{!! Theme::partial('blog.post-meta.published-date', compact('post')) !!}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center">{{ $emptyMessage ?? __('No posts') }}</p>
@endif
