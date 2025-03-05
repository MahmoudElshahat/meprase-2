<section class="blog-post-area blog-post-bg shortcode-blog-posts shortcode-blog-posts-style-1" @style($variablesStyle)>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($posts as $post)
                <div class="col-xl-4 col-lg-6 col-md-10">
                    {!! Theme::partial('blog.post-styles.style-1', compact('post')) !!}
                </div>
            @endforeach
        </div>
    </div>
</section>
