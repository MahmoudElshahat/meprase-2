@php
    $blogSidebar = dynamic_sidebar('blog_sidebar');
@endphp

<section class="blog__area">
    <div class="container">
        <div class="blog__inner-wrap">
            <div class="row">
                <div class="{{ $blogSidebar ? 'col-lg-8' : 'col-12' }}">
                    {!! Theme::partial('blog.posts', compact('posts', 'blogSidebar')) !!}
                </div>

                @if($blogSidebar)
                    <div class="col-lg-4">
                        <aside class="blog__sidebar">
                            {!! $blogSidebar !!}
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
