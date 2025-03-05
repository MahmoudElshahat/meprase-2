<header @class(['tg-header__style-two', 'transparent-header' => theme_option('is_header_transparent', false) && Theme::get('isHomepage')])>
    <div class="tg-header__inner-wrap">
        <div class="tg-header__logo-wrap">
            {!! Theme::partial('header.partials.logo') !!}
        </div>
        <div class="tg-header__right-side">
            @if (theme_option('display_header_top', true))
                {!! Theme::partial('header.header-top', ['wrapperClass' => 'tg-header__top-two']) !!}
            @endif

            <div id="sticky-header" class="tg-header__area tg-header__area-two">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                {!! Theme::partial('header.partials.logo', ['wrapperClass' => 'd-none']) !!}

                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                    {!! Menu::renderMenuLocation('main-menu', ['view' => 'main-menu', 'options' => ['class' => 'navigation']]) !!}
                                </div>
                                {!! Theme::partial('header.action-buttons.index') !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
