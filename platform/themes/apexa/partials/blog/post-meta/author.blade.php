@if ($author = $post->author)
    <div class="blog-avatar">
        <div class="avatar-thumb">
            {{ RvMedia::image($author->avatar_url, 'thumb') }}
        </div>
        <div class="avatar-content">
            {!! __('By :author', [
                'author' => sprintf('<strong>%s</strong>', $author->name, $author->name)
            ]) !!}
        </div>
    </div>
@endif
