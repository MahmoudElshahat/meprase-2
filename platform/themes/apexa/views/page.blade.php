@php
    Theme::set('pageTitle', $page->name);
    Theme::set('isHomepage', BaseHelper::isHomepage($page->getKey()));
@endphp

{!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, Html::tag('div', BaseHelper::clean($page->content), ['class' => 'ck-content'])->toHtml(), $page) !!}
