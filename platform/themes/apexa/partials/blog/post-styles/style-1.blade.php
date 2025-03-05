@use(Theme\Apexa\Support\ThemeHelper)

<div class="blog-post-item shine-animate-item">
    <div class="blog-post-thumb">
        <a href="{{ $post->url }}" class="shine-animate">
            {{ RvMedia::image($post->image, $post->name, 'medium-square') }}
        </a>
        @if (ThemeHelper::isShowPostMeta('list', 'category', true))
            {!! Theme::partial('blog.post-meta.category-badge', compact('post')) !!}
        @endif

    </div>
    <div class="blog-post-content">
        <h2 class="title"><a class="truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a></h2>
        @if (ThemeHelper::isShowPostMeta('list', 'author_name', true))
            {!! Theme::partial('blog.post-meta.author', compact('post')) !!}
        @endif

        <div class="blog-post-meta">
            <ul class="list-wrap">
                <li>
                    <a href="{{ $post->url }}" class="btn">{{ __('Read More') }}</a>
                </li>

                @if (ThemeHelper::isShowPostMeta('list', 'published_date', true))
                    <li>{!! Theme::partial('blog.post-meta.published-date', compact('post')) !!}</li>
                @endif
            </ul>
        </div>
    </div>
</div>
