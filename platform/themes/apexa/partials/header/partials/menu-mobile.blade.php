<div class="tgmobile__menu">
    <nav class="tgmobile__menu-box">
        <div class="close-btn"><i class="fas fa-times"></i></div>
        {!! Theme::partial('header.partials.logo', ['wrapperClass' => 'nav-logo']) !!}

        @if (is_plugin_active('blog'))
            <div class="tgmobile__search">
                <form action="{{ route('public.search') }}">
                    <input type="text" name="q" placeholder="{{ __('Search here...') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        @endif
        <div class="tgmobile__menu-outer"></div>

        <div class="tgmobile__menu-bottom">
            {!! dynamic_sidebar('menu_sidebar') !!}
        </div>

        {!! Theme::partial('language-switcher-mobile') !!}

    </nav>
</div>
<div class="tgmobile__menu-backdrop"></div>
