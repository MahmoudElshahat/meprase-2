@php
    $tabs = Shortcode::fields()->getTabsData(['title', 'description', 'icon', 'icon_image'], $shortcode);
@endphp

<section class="contact__area shortcode-contact-form">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="contact__content">
                    <div class="section-title mb-35">
                        @if ($title = $shortcode->title)
                            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif

                        @if ($description = $shortcode->description)
                            <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                        @endif
                    </div>

                    @if(count($tabs))
                        <div class="contact__info">
                            <ul class="list-wrap">
                                @foreach($tabs as $item)
                                    @continue(! $title = Arr::get($item, 'title'))
                                    <li>
                                        <div class="icon">
                                            @if($iconImage = Arr::get($item, 'icon_image'))
                                                {{ RvMedia::image($iconImage, 'icon') }}
                                            @elseif($icon = Arr::get($item, 'icon'))
                                                <x-core::icon :name="$icon"/>
                                            @endif
                                        </div>
                                        <div class="content">
                                            <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>

                                            @if ($description = Arr::get($item, 'description'))
                                                <p>{!! BaseHelper::clean($description) !!}</p>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <div class="contact__form-wrap">
                    @if ($formTitle = $shortcode->form_title)
                        <h2 class="title">{!! BaseHelper::clean($formTitle) !!}</h2>
                    @endif

                    @if ($formDescription = $shortcode->form_description)
                        <p class="truncate-2-custom">{!! BaseHelper::clean($formDescription) !!}</p>
                    @endif

                    {!! $form
                        ->setFormInputClass('')
                        ->setFormInputWrapperClass('form-grp')
                        ->setFormLabelClass('form-label')
                        ->modify(
                            'submit', 'submit', ['attr' => ['class' => 'btn'], 'label' => $shortcode->form_button_label ?: __('Submit')], true)
                        ->renderForm()
                    !!}
                    <p class="ajax-response mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</section>
