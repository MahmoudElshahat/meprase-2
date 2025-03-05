@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

<section class="services__area-six services__bg-six shortcode-services-tab" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title white-title mb-40">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! Basehelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title">{!! Basehelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>

            @if (($buttonUrl = $shortcode->button_url) && ($buttonLabel = $shortcode->button_label))
                <div class="col-lg-6">
                    <div class="section-more-btn">
                        <a href="{{ $buttonUrl }}" class="btn border-btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="services__tab-wrap">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($services as $service)
                            <li class="nav-item" role="presentation">
                                <button
                                    @class(['nav-link', 'active' => $loop->first])
                                    id="service-{{ $service->getKey() }}"
                                    data-bs-toggle="tab"
                                    data-bs-target="#service-{{ $service->getKey() }}-tab"
                                    type="button" role="tab"
                                    aria-controls="service-{{ $service->getKey() }}-tab"
                                    aria-selected="true"
                                >
                                   <span class="icon">
                                        @if($iconImage = $service->getMetaData('icon_image', true))
                                           {{ RvMedia::image($iconImage, 'icon') }}
                                       @elseif($icon = $service->getMetaData('icon', true))
                                           <x-core::icon :name="$icon"/>
                                       @endif
                                   </span> {{ $service->name }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach($tabs as $tab)
                            @php
                                $service = $services->where('id', $tab['service_id'])->first();
                                $featuredTitles = array_filter( array_map(function (int $index) use ($tab) {
                                    if (! $title = Arr::get($tab, "featured_title_$index")) {
                                        return null;
                                    }

                                    return $title;
                                }, range(1, 5)));

                            @endphp
                            <div @class(['tab-pane fade', 'show active' => $loop->first]) id="service-{{ $tab['service_id'] }}-tab" role="tabpanel" aria-labelledby="service-{{ $tab['service_id'] }}-tab" tabindex="0">
                                <div class="services__item-four shine-animate-item">
                                    @if ($image = Arr::get($tab, 'image', $service->image))
                                        <div class="services__thumb-four shine-animate">
                                            {{ RvMedia::image($image, $tab['title']) }}
                                        </div>
                                    @endif

                                    <div class="services__content-four">
                                        <h2 class="title"><a href="{{ $service->url }}">{!! BaseHelper::clean($tab['title']) !!}</a></h2>
                                        @if ($description = Arr::get($tab, 'description', $service->description))
                                            <p>{!! BaseHelper::clean($description) !!}</p>
                                        @endif

                                        @if(count($featuredTitles))
                                            <div class="about__list-box">
                                                <ul class="list-wrap">
                                                    @foreach($featuredTitles as $featuredTitle)
                                                        <li><i class="fas fa-check"></i>{!! BaseHelper::clean($featuredTitle) !!}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <a
                                            href="{{ Arr::get($tab, 'button_url') ?: $service->url }}"
                                            class="btn"
                                        >
                                            {!! BaseHelper::clean(Arr::get($tab, 'button_label') ?:  __('Read More')) !!}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
