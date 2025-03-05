@php
    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;
    $numberOfItemsPerRow = (int) $shortcode->number_of_items_per_row ?: 3;

    $itemWrapperClass = match ($numberOfItemsPerRow) {
        1 => 'col-lg-12',
        2 => 'col-lg-6',
        default => 'col-lg-4 col-md-6 col-sm-8',
    };
@endphp

<section
    class="pricing__area pricing__bg shortcode-pricing"
    @style([
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url('$bgImage')" => $bgImage,
    ])
>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section-title text-center mb-30 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="pricing__item-wrap">
            <div class="pricing__tab">
                <span class="pricing__tab-btn monthly_tab_title">{{ __('Monthly') }}</span>
                <span class="pricing__tab-switcher"></span>
                <span class="pricing__tab-btn annual_tab_title">{{ __('Yearly') }}</span>
            </div>
            <div class="row">
                @foreach($packages as $package)
                    <div @class($itemWrapperClass)>
                        <div class="pricing__box">
                            <div class="pricing__head">
                                <h5 class="title">{{ $package->name }}</h5>
                            </div>
                            <div class="pricing__price">
                                <h2 class="price monthly_price"> {{ $package->price }}<span>/ {{ $package->duration->label() }}</span></h2>
                                <h2 class="price annual_price">{{ $package->annual_price }} <span>/ {{ __('Yearly') }}</span></h2>
                            </div>
                            <div class="pricing__list">
                                <ul class="list-wrap">
                                    @foreach ($package->feature_list as $feature)
                                        <li>
                                            <span>
                                                @if ($feature['is_available'])
                                                    <i class="fa fa-check text-success"></i>
                                                @else
                                                    <i class="fa fa-ban text-danger"></i>
                                                @endif
                                                <span class="ms-2">{{ $feature['value'] }}</span>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @if(($buttonLabel = $package->action_label)
                                && ($buttonUrl = $package->action_url))
                                <div class="pricing__btn">
                                    <a href="{{ $buttonUrl }}" class="btn">{!! BaseHelper::clean($buttonLabel) !!}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
