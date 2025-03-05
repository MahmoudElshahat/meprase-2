<section class="choose__area-five choose__area-six shortcode-about-us-information shortcode-about-us-information-style-6" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 mb-35">
                <div class="choose__content-five">
                    <div class="section-title mb-30 tg-heading-subheading animation-style3">
                        @if ($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if ($title = $shortcode->title)
                            <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                    @endif

                    @if(count($tabs))
                        <div class="choose__box-wrap">
                            <div class="row">
                                @foreach($tabs as $item)
                                    @continue(! ($title = Arr::get($item, 'title')))

                                    <div class="col-sm-6">
                                        <div class="choose__box">
                                            @php
                                                $iconImage = Arr::get($item, 'icon_image');
                                                $icon = Arr::get($item, 'icon');
                                            @endphp

                                            @if($iconImage || $icon)
                                                <div class="icon">
                                                    @if($iconImage)
                                                        {{ RvMedia::image($iconImage, 'icon') }}
                                                    @else
                                                        <x-core::icon :name="$icon"/>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="content">
                                                <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>

                                                @if ($description = Arr::get($item, 'description'))
                                                    <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="about-bottom">
                        @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                            <a href="{{ $buttonUrl }}" class="btn btn-two">{!! BaseHelper::clean($buttonLabel) !!}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-9 mb-35">
                <div class="choose__img-wrap-five">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'image') }}
                    @endif

                    @if ($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'image 1', attributes: ['class' => 'alltuchtopdown']) }}
                    @endif

                    @if ($image2 = $shortcode->image_2)
                        {{ RvMedia::image($image2, 'image 2', attributes: ['class' => 'shape-bottom-left']) }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
