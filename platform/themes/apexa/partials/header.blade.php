{!! Theme::partial('header.index') !!}

{!! Theme::partial('menu-sidebar.index') !!}

@if (is_plugin_active('blog'))
    {!! Theme::partial('search-popup') !!}
@endif

