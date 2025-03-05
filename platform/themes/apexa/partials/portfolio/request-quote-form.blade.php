@if (is_plugin_active('portfolio'))
    <div class="testimonial__form">
        @if($title = theme_option('quotation_form_title'))
            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
        @endif
        {!! \Botble\Portfolio\Forms\Fronts\QuotationForm::create()
            ->renderForm()
        !!}
    </div>
@endif
