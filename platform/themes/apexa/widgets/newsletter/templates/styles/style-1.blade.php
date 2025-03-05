<section class="call-back-area widget-newsletter widget-newsletter-style-1" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="call-back-content">
                    @if ($title = Arr::get($config, 'title'))
                        <div class="section-title white-title mb-10 tg-heading-subheading animation-style3">
                            <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                        </div>
                    @endif

                    @if ($description = Arr::get($config, 'description'))
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if ($image = Arr::get($config, 'image'))
                        <div class="shape">
                            {{ RvMedia::image($image, 'shape', attributes: ['data-aos' => 'fade-right', 'data-aos-delay' => 400]) }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="call-back-form">
                    {!! $form->renderForm() !!}
                </div>
            </div>
        </div>
    </div>
</section>
