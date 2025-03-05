<section class="choose__area-three whychoose__area-home7 shortcode-about-us-information shortcode-about-us-information-style-7" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-9">
                <div class="choose__img-wrap-home7">
                    @if ($image = $shortcode->image)
                        <div class="main-img-why">
                            {{ RvMedia::image($image, 'image') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-5">
                <div class="choose__content-three">
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
                    <div class="choose__list">
                        <ul class="list-wrap">
                            @foreach($tabs as $item)
                                @continue(! ($title = Arr::get($item, 'title')))

                                <li>
                                    <div class="choose__list-box">
                                        <div class="choose__list-icon">
                                            @if($iconImage = Arr::get($item, 'icon_image'))
                                                {{ RvMedia::image($iconImage, 'icon') }}
                                            @elseif($icon = Arr::get($item, 'icon'))
                                                <x-core::icon :name="$icon"/>
                                            @endif
                                        </div>
                                        <div class="choose__list-content">
                                            <h4 class="title">{!! BaseHelper::clean($title) !!}</h4>
                                            @if ($description = Arr::get($item, 'description'))
                                                <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
