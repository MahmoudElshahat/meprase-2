@if ($category = $post->firstCategory)
    <a href="{{ $category->url }}" @class(['post-tag', $wrapperClass ?? null])>{{ $category->name }}</a>
@endif
