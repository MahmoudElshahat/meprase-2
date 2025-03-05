<section class="features__area shortcode-service-categories shortcode-service-categories-style-1" @style($variablesStyle)>
    <div class="container-fluid p-0">
        <div class="features__item-wrap">
            <div class="row g-0">
                @foreach($serviceCategories as $category)
                    <div class="col-lg-3 col-md-6">
                        <div class="features__item service-categories-item">
                            <div class="features__icon service-categories-icon">
                                @if($iconImage = $category->getMetaData('icon_image', true))
                                    {{ RvMedia::image($iconImage, 'icon') }}
                                @elseif($icon = $category->getMetaData('icon', true))
                                    <x-core::icon :name="$icon"/>
                                @endif
                            </div>
                            <div class="features__content">
                                <h4 class="title"><a class="truncate-1-custom" title="{{ $category->name }}" href="{{ $category->url }}">{{ $category->name }}</a></h4>
                                @if ($description = $category->description)
                                    <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
