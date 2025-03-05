@if ($content = $shortcode->content_text)
    <blockquote
        class="shortcode-content-quote"
        @style(["--background-color: $shortcode->background_color" => $shortcode->background_color])
    >
        <p>
            {!! BaseHelper::clean($content) !!}
        </p>
    </blockquote>
@endif
