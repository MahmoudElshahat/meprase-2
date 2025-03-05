<section class="features__area-two shortcode-service-categories shortcode-service-categories-style-2" @style($variablesStyle)>
    <div class="container">
        <div class="row gutter-24 justify-content-center">
            @foreach($serviceCategories as $category)
                <div class="col-lg-4 col-md-6">
                    <div class="features__item-two service-categories-item">
                        <div class="features__icon-two service-categories-icon">
                            @if($iconImage = $category->getMetaData('icon_image', true))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = $category->getMetaData('icon', true))
                                <x-core::icon :name="$icon"/>
                            @endif
                        </div>
                        <div class="features__content-two">
                            <h4 class="title"><a class="truncate-1-custom" title="{{ $category->name }}" href="{{ $category->url }}">{{ $category->name }}</a></h4>

                            @if ($description = $category->description)
                                <p class="truncate-3-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
