<div id="preloader">
    <div id="loader" class="loader">
        <div class="loader-container">
            <div class="loader-icon">
                @if ($image = theme_option('preloader_image'))
                    {{ RvMedia::image($image, 'Preloader', 'thumb') }}

                @else
                    <img src="{{ Theme::asset()->url('images/preloader.png') }}" alt="Preloader">
                @endif
            </div>
        </div>
    </div>
</div>
