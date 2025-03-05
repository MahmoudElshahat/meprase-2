@use(Theme\Apexa\Support\ThemeHelper)

<div class="blog__post-two shine-animate-item">
    <div class="blog__post-thumb-two">
        <a href="{{ $post->url }}" class="shine-animate">
            {{ RvMedia::image($post->image, $post->name, 'medium-square') }}
        </a>
    </div>
    <div class="blog__post-content-two">
        <div class="blog-post-meta">
            <ul class="list-wrap">
                @if (ThemeHelper::isShowPostMeta('list', 'category', true))
                    <li>
                        {!! Theme::partial('blog.post-meta.category-badge', ['post' => $post, 'wrapperClass' => 'blog__post-tag-two']) !!}
                    </li>
                @endif

                @if (ThemeHelper::isShowPostMeta('list', 'published_date', true))
                    <li>{!! Theme::partial('blog.post-meta.published-date', compact('post')) !!}</li>
                @endif
            </ul>
        </div>
        <h2 class="title">
            <a class="truncate-2-custom" title="{{ $post->name }}" href="{{ $post->url }}">{{ $post->name }}</a>
        </h2>

        @if (ThemeHelper::isShowPostMeta('list', 'author_name', true))
            {!! Theme::partial('blog.post-meta.author', compact('post')) !!}
        @endif
    </div>
</div>
