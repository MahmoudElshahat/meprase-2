<section class="about__area-six shortcode-about-us-information shortcode-about-us-information-style-4" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="about__img-wrap-six">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'image') }}
                    @endif

                    @if ($image1 = $shortcode->image_1)
                        {{ RvMedia::image($image1, 'image', attributes: ['data-parallax' => '{"x" : 40 }']) }}
                    @endif

                    @if (($dataCount = $shortcode->data_count) && ($dataCountDes = $shortcode->data_count_description))
                        <div class="experience__box-four">
                            <h2 class="title">{{ $dataCount }}</h2>
                            <p>{!! BaseHelper::clean($dataCountDes) !!}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content-six">
                    <div class="section-title mb-25 tg-heading-subheading animation-style3">
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
                    <div class="about__content-inner-four">
                        @if (count($tabs))
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    @foreach($tabs as $item)
                                        @continue(! ($title = Arr::get($item, 'title')) || Arr::get($item, 'icon'))
                                        <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <ul class="list-wrap">
                            @foreach($tabs as $item)
                                @php
                                    $title = Arr::get($item, 'title');
                                    $icon = Arr::get($item, 'icon');
                                @endphp

                                @continue(! $title || ! $icon)
                                <li class="mb-3">
                                    <div class="about__satisfied-box">
                                        <div class="icon">
                                            @if($iconImage = Arr::get($item, 'icon_image'))
                                                {{ RvMedia::image($iconImage, 'icon') }}
                                            @elseif($icon)
                                                <x-core::icon :name="$icon"/>
                                            @endif
                                        </div>
                                        <div class="content">
                                            <h2 class="title">{!! BaseHelper::clean($title) !!}</h2>

                                            @if ($description = Arr::get($item, 'description'))
                                                <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @if (($buttonLabel = $shortcode->button_label) && ($buttonUrl = $shortcode->button_url))
                        <a href="{{ $buttonUrl }}" class="btn btn-two">{!! BaseHelper::clean($buttonLabel) !!}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
