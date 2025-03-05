@if ($authorName = $shortcode->author_name)
    <div class="author-wrap">
        @if ($authorAvatar = $shortcode->author_avatar)
            <div class="thumb">
                {{ RvMedia::image($authorAvatar, $authorName, 'thumb') }}
            </div>
        @endif

        <div class="content">
            @if ($signature = $shortcode->author_signature)
                {{ RvMedia::image($signature, 'signature') }}
            @endif

            <h4 class="title"> {!! BaseHelper::clean($authorName) !!}
                @if ($authorTitle = $shortcode->author_title)
                    <span>, {!! BaseHelper::clean($authorTitle) !!}</span>
                @endif
            </h4>
        </div>
    </div>
@endif
