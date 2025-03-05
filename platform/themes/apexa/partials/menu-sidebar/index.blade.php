<div class="offCanvas__info">
    <div class="offCanvas__close-icon menu-close">
        <button><i class="far fa-window-close"></i></button>
    </div>

    {!! Theme::partial('header.partials.logo', ['wrapperClass' => 'offCanvas__logo mb-30']) !!}

    {!! dynamic_sidebar('menu_sidebar') !!}
</div>
<div class="offCanvas__overly"></div>
