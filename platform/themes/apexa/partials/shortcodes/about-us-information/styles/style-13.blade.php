<section class="about__area-five shortcode-about-us-information shortcode-about-us-information-style-13" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about__content-five">
                    @if ($title = $shortcode->title)
                        <div class="section-title mb-30">
                            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>
                        </div>
                    @endif

                    <div class="about__img-wrap-five">
                        @if ($image = $shortcode->image)
                            {{ RvMedia::image($image, 'about-us-information') }}
                        @endif

                        @if (($dataCount = $shortcode->data_count) && ($dataCountDes = $shortcode->data_count_description))
                            <div class="experience-year">
                                <div class="icon">
                                    <i class="flaticon-trophy"></i>
                                </div>
                                <div class="content">
                                    <h6 class="circle rotateme">{!! BaseHelper::clean($dataCountDes) !!} {{ $dataCount }} -</h6>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
