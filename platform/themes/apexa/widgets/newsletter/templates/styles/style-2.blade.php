<div class="footer-newsletter widget-newsletter widget-newsletter-style-2" @style($variablesStyle)>
    @if ($title = Arr::get($config, 'title'))
        <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>
    @endif

    {!! $form->renderForm() !!}
</div>
