@php
    $postStyle = theme_option('post_style');

    $postStyle = in_array($postStyle, ['style-1', 'style-2']) ? $postStyle : 'style-1';
@endphp

@if ($posts->isNotEmpty())
    <div class="blog-post-wrap">
        <div class="row gutter-24">
            @foreach($posts as $post)
                <div class="{{ $blogSidebar ? 'col-lg-6' : 'col-lg-4 col-md-6' }}">
                    {!! Theme::partial("blog.post-styles.$postStyle", compact('post')) !!}
                </div>
            @endforeach
        </div>

        @if ($posts instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $posts->total() > 0)
            <div class="view-more text-center wow animated fadeIn">
                {{ $posts->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) }}
            </div>
        @endif
    </div>
@endif
