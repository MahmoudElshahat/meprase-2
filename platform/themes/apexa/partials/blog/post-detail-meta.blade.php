@use(Theme\Apexa\Support\ThemeHelper)

<div class="blog-post-meta">
    <ul class="list-wrap">
        @if (ThemeHelper::isShowPostMeta('detail', 'author_name', true))
            <li>
                {!! Theme::partial('blog.post-meta.author', compact('post')) !!}
            </li>
        @endif

        @if (ThemeHelper::isShowPostMeta('detail', 'category', true))
            <li>
                {!! Theme::partial('blog.post-meta.category-badge', ['post' => $post, 'wrapperClass' => 'blog__post-tag-two']) !!}
            </li>
        @endif

        @if (ThemeHelper::isShowPostMeta('detail', 'published_date', true))
            <li>{!! Theme::partial('blog.post-meta.published-date', compact('post')) !!}</li>
        @endif

        @if (ThemeHelper::isShowPostMeta('detail', 'reading_time', true))
            <li>{!! Theme::partial('blog.post-meta.reading-time', compact('post')) !!}</li>
        @endif

        @if (ThemeHelper::isShowPostMeta('detail', 'views_count', true))
            <li>{!! Theme::partial('blog.post-meta.views-count', compact('post')) !!}</li>
        @endif
    </ul>
</div>
