<section class="services__area-home8 shortcode-service-categories shortcode-service-categories-style-3" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            @foreach($serviceCategories as $category)
                <div class="col-lg-3 col-sm-6">
                    <div class="card-services-type-01">
                        <div class="card-icon service-categories-icon">
                            @if($iconImage = $category->getMetaData('icon_image', true))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = $category->getMetaData('icon', true))
                                <x-core::icon :name="$icon"/>
                            @endif
                        </div>
                        <div class="card-info">
                            <a title="{{ $category->name }}" href="{{ $category->url }}"><h5 class="truncate-1-custom">{{ $category->name }}</h5></a>
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
