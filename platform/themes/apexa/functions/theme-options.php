<?php

use Botble\Theme\Facades\Theme;
use Botble\Theme\ThemeOption\Fields\ColorField;
use Botble\Theme\ThemeOption\Fields\IconField;
use Botble\Theme\ThemeOption\Fields\MediaImageField;
use Botble\Theme\ThemeOption\Fields\NumberField;
use Botble\Theme\ThemeOption\Fields\RepeaterField;
use Botble\Theme\ThemeOption\Fields\TextField;
use Botble\Theme\ThemeOption\Fields\ToggleField;
use Botble\Theme\ThemeOption\Fields\UiSelectorField;

app()->booted(callback: function () {
    $headerStyles = [];

    foreach (range(1, 4) as $i) {
        $headerStyles[$i] = [
            'label' => __('Header :number', ['number' => $i]),
            'image' => Theme::asset()->url(sprintf('images/header-styles/style-%s.png', $i)),
        ];
    }

    theme_option()
        ->setField([
            'id' => 'primary_color',
            'section_id' => 'opt-text-subsection-general',
            'type' => 'customColor',
            'label' => __('Primary color'),
            'attributes' => [
                'name' => 'primary_color',
                'value' => '#ff2b4a',
            ],
        ])
        ->setSection([
            'title' => __('Header'),
            'id' => 'opt-text-subsection-header',
            'subsection' => true,
            'icon' => 'ti ti-layout-navbar',
            'fields' => [
                ToggleField::make()
                    ->label(__('Display header top?'))
                    ->id('display_header_top')
                    ->defaultValue(true)
                    ->name('display_header_top'),
                ColorField::make()
                    ->label(__('Header top text color'))
                    ->id('header_top_text_color')
                    ->name('header_top_text_color'),
                ColorField::make()
                    ->label(__('Header top background color'))
                    ->id('header_top_background_color')
                    ->name('header_top_background_color'),
                UiSelectorField::make()
                    ->label(__('Header style'))
                    ->name('header_style')
                    ->options($headerStyles)
                    ->withoutAspectRatio()
                    ->numberItemsPerRow(1)
                    ->defaultValue(1),
                ToggleField::make()
                    ->label(__('Header transparent?'))
                    ->name('is_header_transparent')
                    ->helperText('When this feature is enabled, the header will have a transparent background and will float to the top of the page.'),
                RepeaterField::make()
                    ->id('header_action_buttons')
                    ->name('header_action_buttons')
                    ->label(__('Header action buttons'))
                    ->fields([
                        TextField::make()
                            ->name('label')
                            ->label(__('Label')),
                        TextField::make()
                            ->name('url')
                            ->label(__('URL')),
                        IconField::make()
                            ->name('icon')
                            ->label(__('Icon')),
                        MediaImageField::make()
                            ->name('icon_image')
                            ->label(__('Icon image (It will override icon above if set)')),
                    ]),
            ],
        ])
        ->setSection([
            'title' => __('Footer'),
            'id' => 'opt-text-subsection-footer',
            'subsection' => true,
            'icon' => 'ti ti-layout-bottombar',
            'fields' => [
                ColorField::make()
                    ->name('footer_background_color')
                    ->label(__('Background color')),
                ColorField::make()
                    ->name('footer_bottom_background_color')
                    ->label(__('Bottom background color')),
                ColorField::make()
                    ->name('footer_border_color')
                    ->label(__('Border color')),
                ColorField::make()
                    ->name('footer_heading_color')
                    ->label(__('Text heading color')),
                ColorField::make()
                    ->name('footer_text_color')
                    ->label(__('Text color')),
                MediaImageField::make()
                    ->name('footer_background_image')
                    ->label(__('Background image')),
            ],
        ])
        ->setSection([
            'title' => __('Styles'),
            'id' => 'opt-text-subsection-styles',
            'subsection' => true,
            'icon' => 'ti ti-brush',
            'fields' => [
                ColorField::make()
                    ->name('primary_color')
                    ->value('#F7A400')
                    ->label(__('Primary color')),
                ColorField::make()
                    ->name('secondary_color')
                    ->value('#191D88')
                    ->label(__('Secondary color')),
                ColorField::make()
                    ->name('heading_color')
                    ->value('#14176C')
                    ->label(__('Heading color')),
                ColorField::make()
                    ->name('text_color')
                    ->value('#3E4073')
                    ->label(__('Text color')),
            ],
        ])
        ->setField(
            ColorField::make()
                ->sectionId('opt-text-subsection-breadcrumb')
                ->id('breadcrumb_background_color')
                ->name('breadcrumb_background_color')
                ->value('')
                ->label(__('Breadcrumb background color'))
        )
        ->setField(
            ColorField::make()
                ->sectionId('opt-text-subsection-breadcrumb')
                ->id('breadcrumb_text_color')
                ->name('breadcrumb_text_color')
                ->value('transparent')
                ->label(__('Breadcrumb text color'))
        )
        ->setField(
            MediaImageField::make()
                ->sectionId('opt-text-subsection-breadcrumb')
                ->id('breadcrumb_background_image')
                ->name('breadcrumb_background_image')
                ->label(__('Breadcrumb background image'))
        )
        ->setField(
            NumberField::make()
                ->sectionId('opt-text-subsection-breadcrumb')
                ->id('breadcrumb_height')
                ->name('breadcrumb_height')
                ->label(__('Breadcrumb height (px)'))
                ->helperText(__('Leave empty to use default height.'))
        )
        ->setField(
            MediaImageField::make()
                ->sectionId('opt-text-subsection-general')
                ->id('preloader_image')
                ->name('preloader_image')
                ->label(__('Preloader image'))
                ->helperText(__('Only support preloader default.'))
        )
        ->setField(
            UiSelectorField::make()
                ->sectionId('opt-text-subsection-blog')
                ->id('post-style')
                ->name('post_style')
                ->label(__('Post style'))
                ->options([
                    'style-1' => [
                        'label' => __('Style :number', ['number' => 1]),
                        'image' => Theme::asset()->url('images/post-styles/style-1.png'),
                    ],
                    'style-2' => [
                        'label' => __('Style :number', ['number' => 2]),
                        'image' => Theme::asset()->url('images/post-styles/style-2.png'),
                    ],
                ])
                ->aspectRatio(UiSelectorField::RATIO_4_3)
                ->numberItemsPerRow(2)
                ->defaultValue('style-1'),
        )
        ->when(is_plugin_active('portfolio'), function () {
            theme_option()->setSection([
                'title' => __('Portfolio'),
                'id' => 'opt-text-subsection-portfolio',
                'subsection' => true,
                'icon' => 'ti ti-briefcase',
                'fields' => [
                    TextField::make()
                        ->id('quotation_form_title')
                        ->name('quotation_form_title')
                        ->label(__('Quotation form title'))
                        ->toArray(),
                    TextField::make()
                        ->id('quotation_form_button_label')
                        ->name('quotation_form_button_label')
                        ->label(__('Quotation form button label'))
                        ->toArray(),
                    NumberField::make()
                        ->id('quotation_form_min_price')
                        ->name('quotation_form_min_price')
                        ->label(__('Quotation form min price'))
                        ->defaultValue(0)
                        ->toArray(),
                    NumberField::make()
                        ->id('quotation_form_max_price')
                        ->name('quotation_form_max_price')
                        ->label(__('Quotation form max price'))
                        ->defaultValue(10000)
                        ->toArray(),
                ],
            ]);
        })
        ->setField([
            'id' => 'blog_post_list_meta_display_default',
            'section_id' => 'opt-text-subsection-blog',
            'type' => 'hidden',
            'attributes' => [
                'name' => 'blog_post_list_meta_display',
                'value' => '[]',
            ],
        ])
        ->setField([
            'id' => 'blog_post_list_meta_display',
            'section_id' => 'opt-text-subsection-blog',
            'type' => 'multiChecklist',
            'label' => __('Post meta display (blog list)'),
            'attributes' => [
                'name' => 'blog_post_list_meta_display[]',
                'value' => json_decode(
                    theme_option('blog_post_list_meta_display', '["category", "author_name", "published_date"]')
                ) ?: [],
                'choices' => $postMetaOptions = [
                    'category' => __('Category'),
                    'author_name' => __('Author name'),
                    'published_date' => __('Published date'),
                ],
            ],
        ])
        ->setField([
            'id' => 'blog_post_detail_meta_display_default',
            'section_id' => 'opt-text-subsection-blog',
            'type' => 'hidden',
            'attributes' => [
                'name' => 'blog_post_detail_meta_display',
                'value' => '[]',
            ],
        ])
        ->setField([
            'id' => 'enabled_products_search_on_header',
            'section_id' => 'opt-text-subsection-ecommerce',
            'type' => 'customSelect',
            'label' => __('Enabled products search on header?'),
            'attributes' => [
                'name' => 'enabled_products_search_on_header',
                'list' => [
                    0 => __('No'),
                    1 => __('Yes'),
                ],
                'value' => 1,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'display_ecommerce_header_actions',
            'section_id' => 'opt-text-subsection-ecommerce',
            'type' => 'customSelect',
            'label' => __('Display ecommerce header actions?'),
            'attributes' => [
                'name' => 'display_ecommerce_header_actions',
                'list' => [
                    0 => __('No'),
                    1 => __('Yes'),
                ],
                'value' => 1,
                'options' => [
                    'class' => 'form-control',
                ],
            ],
        ])
        ->setField([
            'id' => 'blog_post_detail_meta_display',
            'section_id' => 'opt-text-subsection-blog',
            'type' => 'multiChecklist',
            'label' => __('Post meta display (blog detail)'),
            'attributes' => [
                'name' => 'blog_post_detail_meta_display[]',
                'value' => json_decode(
                    theme_option(
                        'blog_post_detail_meta_display',
                        '["category", "author_name", "published_date", "reading_time", "views_count"]'
                    ),
                    true
                ) ?: [],
                'choices' => [...$postMetaOptions,
                    'reading_time' => __('Reading time'),
                    'views_count' => __('Views count')],
            ],
        ]);
});
