@php
    $isFloatingBlockEnabled = $shortcode->floating_block_title || $shortcode->floating_block_description;
@endphp

<section class="faqs__area-six shortcode-faq">
    <div class="circle" data-parallax='{"x" : 100 , "y" : 100 }'></div>
    <div class="container">
        <div class="row align-items-center">
            @if($isFloatingBlockEnabled)
                <div class="col-lg-6 mb-30">
                    <div class="box-need-help">
                        @if ($image = $shortcode->image)
                            {{ RvMedia::image($image, 'faq') }}
                        @endif

                        <div class="box-text-need-help">
                            @if ($floatingBlockIcon = $shortcode->floating_block_icon)
                                <x-core::icon :name="$floatingBlockIcon"/>
                            @endif

                            @if ($floatingBlockTitle = $shortcode->floating_block_title)
                                <h6>{!! BaseHelper::clean($floatingBlockTitle) !!}</h6>
                            @endif

                            @if ($floatingBlockDescription = $shortcode->floating_block_description)
                                <p class="truncate-3-custom">{!! BaseHelper::clean($floatingBlockDescription) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div @class(['mb-30', 'col-lg-6' => $isFloatingBlockEnabled, 'col-lg-12' => ! $isFloatingBlockEnabled])>
                <div class="box-faq-right">
                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title mb-20">{!! BaseHelper::clean($title) !!}</h2>
                    @endif

                    @if ($description = $shortcode->description)
                        <p class="tg-element-title mb-40">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    <div class="block-faqs">
                        <div class="accordion wow fadeInUp" id="accordionFAQ">
                            @foreach($faqs as $faq)
                                @php
                                    $id = 'faq-item-' . $faq->getKey();
                                    $headingId = 'heading-faq-item-' . $faq->getKey();
                                @endphp
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="{{ $headingId }}">
                                        <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $id }}" aria-expanded="true" aria-controls="{{ $id }}">
                                            {!! BaseHelper::clean($faq->question) !!}
                                        </button>
                                    </h5>
                                    <div class="accordion-collapse collapse" id="{{ $id }}" aria-labelledby="{{ $headingId }}" data-bs-parent="#{{ $headingId }}">
                                        <div class="accordion-body">
                                            {!! BaseHelper::clean($faq->answer) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
