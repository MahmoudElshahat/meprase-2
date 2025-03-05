<div class="sidebar__widget sidebar__widget-three contact-form-widget"
    @style(["background-color: $backgroundColor" => $backgroundColor])
>
    @if ($title = Arr::get($config, 'title'))
        <h4 class="sidebar__widget-title">{!! BaseHelper::clean($title) !!}</h4>
    @endif
    <div class="sidebar__form">
        {!! $form->renderForm() !!}
    </div>
</div>