<section class="choose__area-four shortcode-about-us-information shortcode-about-us-information-style-12" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="choose__content-four">
                    <div class="section-title white-title mb-20">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    @endif
                </div>
            </div>
            @if (count($tabs))
                <div class="col-lg-7">
                    <div class="choose__list-two">
                        {!! Theme::partial('shortcodes.about-us-information.partials.featured-list', [
                            'tabs' => $tabs,
                            'contentWrapperClass' => 'choose__list-content-two',
                            'iconWrapperClass' => 'choose__list-icon-two',
                            'itemWrapperClass' => 'choose__list-box-two',
                        ]) !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
