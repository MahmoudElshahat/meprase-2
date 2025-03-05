
    @if (theme_option('display_header_top', true))
        {!! Theme::partial('header.header-top') !!}
    @endif

    <div id="sticky-header" @class(['tg-header__area tg-header__area-five', 'transparent-header' => theme_option('is_header_transparent', false) && Theme::get('isHomepage')])>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            {!! Theme::partial('header.partials.logo') !!}
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

</header>