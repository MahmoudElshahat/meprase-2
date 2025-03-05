<?php

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\UiSelectorFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\SimpleSlider\Models\SimpleSlider;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Arr;

if (! is_plugin_active('simple-slider')) {
    return;
}

app()->booted(function () {
    add_filter(SIMPLE_SLIDER_VIEW_TEMPLATE, function () {
        return Theme::getThemeNamespace('partials.shortcodes.simple-slider.index');
    }, 120);

    Shortcode::modifyAdminConfig('simple-slider', function (ShortcodeForm $form) {
        $attributes = is_array($form->getModel()) ? $form->getModel() : [];

        return $form
            ->addBefore(
                'key',
                'style',
                UiSelectorField::class,
                UiSelectorFieldOption::make()
                    ->choices(
                        collect(range(1, 3))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/shortcodes/simple-slider/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($attributes, 'style', 'style-1'))
                    ->withoutAspectRatio()
                    ->numberItemsPerRow(1)
                    ->toArray()
            );
    });

    Shortcode::register('hero-banner-slider', __('Hero Banner Slider'), __('Hero Banner Slider'), function (ShortcodeCompiler $shortcode): ?string {
        $slider = SimpleSlider::query()
            ->wherePublished()
            ->where('key', $shortcode->simple_slider_key)
            ->first();

        if (empty($slider) || $slider->sliderItems->isEmpty()) {
            return null;
        }

        if (setting('simple_slider_using_assets', true) && defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
            $version = '1.0.2';
            $dist = asset('vendor/core/plugins/simple-slider');

            Theme::asset()
                ->container('footer')
                ->usePath(false)
                ->add(
                    'simple-slider-owl-carousel-css',
                    $dist . '/libraries/owl-carousel/owl.carousel.css',
                    [],
                    [],
                    $version
                )
                ->add('simple-slider-css', $dist . '/css/simple-slider.css', [], [], $version)
                ->add(
                    'simple-slider-owl-carousel-js',
                    $dist . '/libraries/owl-carousel/owl.carousel.js',
                    ['jquery'],
                    [],
                    $version
                )
                ->add('simple-slider-js', $dist . '/js/simple-slider.js', ['jquery'], [], $version);
        }

        $tabs = Shortcode::fields()->getTabsData(['title'], $shortcode);

        return Theme::partial('shortcodes.hero-banner-slider.index', [
            'sliders' => $slider->sliderItems,
            'tabs' => $tabs,
            'shortcode' => $shortcode,
        ]);
    });

    Shortcode::setPreviewImage('hero-banner-slider', Theme::asset()->url('images/ui-blocks/hero-banner-slider.png'));

    Shortcode::setAdminConfig('hero-banner-slider', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
            )
            ->add(
                'description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Description'))
            )
            ->add(
                'simple_slider_key',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/simple-slider::simple-slider.select_slider'))
                    ->choices(SimpleSlider::query()
                        ->wherePublished()
                        ->pluck('name', 'key')
                        ->all())
                    ->toArray()
            )
            ->add(
                'tabs',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->attrs($attributes)
                    ->fields([
                        'title' => [
                            'title' => __('Title'),
                        ],
                    ])
            )
            ->add(
                'open_config_team_information',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content('<fieldset class="form-fieldset">')
            )
            ->add(
                'alert',
                AlertField::class,
                AlertFieldOption::make()
                    ->content('Team Information')
            )
            ->add(
                'team_title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Team Title'))
            )
            ->add(
                'team_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Team Image'))
            )
            ->add(
                'closed_config_team_information',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content('</fieldset>')
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background Color'))
            );
    });
});
