<?php

use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\UiSelectorFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Portfolio\Models\Package;
use Botble\Portfolio\Models\Project;
use Botble\Portfolio\Models\Service;
use Botble\Portfolio\Models\ServiceCategory;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Arr;

if (! is_plugin_active('portfolio')) {
    return;
}

app()->booted(function () {
    Shortcode::register('pricing', __('Pricing'), __('Pricing'), function (ShortcodeCompiler $shortcode): ?string {
        if (! ($packageIds = Shortcode::fields()->getIds('package_ids', $shortcode))) {
            return null;
        }

        $packages = Package::query()
            ->with(['metadata', 'slugable'])
            ->wherePublished()
            ->whereIn('id', $packageIds)
            ->get();

        if ($packages->isEmpty()) {
            return null;
        }

        return Theme::partial('shortcodes.pricing.index', compact('shortcode', 'packages'));
    });

    Shortcode::setPreviewImage('pricing', Theme::asset()->url('images/ui-blocks/pricing.png'));

    Shortcode::setAdminConfig('pricing', function (array $attributes) {
        $packages = Package::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->toArray()
            )
            ->add(
                'package_ids',
                SelectField::class,
                SelectFieldOption::make()
                    ->choices($packages)
                    ->selected(explode(',', Arr::get($attributes, 'package_ids')))
                    ->label(__('Chooses packages'))
                    ->searchable()
                    ->multiple()
                    ->toArray()
            )
            ->add(
                'number_of_items_per_row',
                SelectField::class,
                SelectFieldOption::make()
                ->label(__('Number items per row'))
                ->choices([
                    1 => __('1 item per row'),
                    2 => __(':number items per row', ['number' => 2]),
                    3 => __(':number items per row', ['number' => 3]),
                ])
            )
            ->add(
                'background_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background image'))
                    ->toArray()
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->toArray(),
            );
    });

    Shortcode::register('services', __('Services'), __('Services'), function (ShortcodeCompiler $shortcode): ?string {
        if (! ($serviceIds = Shortcode::fields()->getIds('service_ids', $shortcode))) {
            return null;
        }

        $services = Service::query()
            ->with(['metadata', 'slugable'])
            ->wherePublished()
            ->whereIn('id', $serviceIds)
            ->get();

        if ($services->isEmpty()) {
            return null;
        }

        return Theme::partial('shortcodes.services.index', compact('shortcode', 'services'));
    });

    Shortcode::setAdminConfig('services', function (array $attributes) {
        $services = Service::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'style',
                UiSelectorField::class,
                UiSelectorFieldOption::make()
                    ->choices(
                        collect(range(1, 7))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/shortcodes/services/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($attributes, 'style', 'style-1'))
                    ->withoutAspectRatio()
                    ->numberItemsPerRow(1)
                    ->toArray()
            )
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->toArray()
            )
            ->add('description', TextareaField::class, DescriptionFieldOption::make())
            ->add(
                'service_ids',
                SelectField::class,
                SelectFieldOption::make()
                    ->choices($services)
                    ->selected(explode(',', Arr::get($attributes, 'service_ids')))
                    ->label(__('Chooses services'))
                    ->searchable()
                    ->multiple()
                    ->toArray()
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button label'))
                    ->toArray()
            )
            ->add(
                'button_url',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button URL'))
                    ->toArray()
            )
            ->add(
                'background_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background image'))
                    ->toArray()
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->toArray(),
            );
    });

    Shortcode::register('services-tab', __('Services Tab'), __('Services Tab'), function (ShortcodeCompiler $shortcode): ?string {
        $tabs = Shortcode::fields()->getTabsData([
            'service_id',
            'title',
            'description',
            'featured_title_1',
            'featured_title_2',
            'featured_title_3',
            'featured_title_4',
            'featured_title_5',
            'button_url',
            'button_label',
        ], $shortcode);

        $tabs = array_filter($tabs, fn ($tabs) => $tabs['title'] && $tabs['service_id']);

        if (! $tabs) {
            return null;
        }

        $serviceIds = collect($tabs)->pluck('service_id')->toArray();

        if (! $serviceIds) {
            return null;
        }

        $services = Service::query()
            ->with(['metadata', 'slugable'])
            ->wherePublished()
            ->whereIn('id', $serviceIds)
            ->get();

        if ($services->isEmpty()) {
            return null;
        }

        return Theme::partial('shortcodes.services-tab.index', compact('shortcode', 'services', 'tabs'));
    });

    Shortcode::setPreviewImage('services-tab', Theme::asset()->url('images/ui-blocks/services-tab.png'));

    Shortcode::setAdminConfig('services-tab', function (array $attributes) {
        $services = Service::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->toArray()
            )
            ->add(
                'tabs',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->attrs($attributes)
                    ->fields([
                        'service_id' => [
                            'title' => __('Choose Service'),
                            'options' => $services,
                            'type' => 'select',
                        ],
                        'title' => [
                            'title' => __('Title'),
                        ],
                        'description' => [
                            'title' => __('Description'),
                            'type' => 'textarea',
                        ],
                        'featured_title_1' => [
                            'title' => __('Featured title :number', ['number' => 1]),
                        ],
                        'featured_title_2' => [
                            'title' => __('Featured title :number', ['number' => 2]),
                        ],
                        'featured_title_3' => [
                            'title' => __('Featured title :number', ['number' => 3]),
                        ],
                        'featured_title_4' => [
                            'title' => __('Featured title :number', ['number' => 4]),
                        ],
                        'featured_title_5' => [
                            'title' => __('Featured title :number', ['number' => 5]),
                        ],
                        'button_label' => [
                            'title' => __('Button label'),
                        ],
                        'button_url' => [
                            'title' => __('Button URL'),
                        ],
                    ])
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button label'))
                    ->toArray()
            )
            ->add(
                'button_url',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button URL'))
                    ->toArray()
            )
            ->add(
                'background_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background image'))
                    ->toArray()
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->toArray(),
            );
    });

    Shortcode::register('service-categories', __('Service Categories'), __('Service Categories'), function (ShortcodeCompiler $shortcode): ?string {
        if (! ($serviceCategoryIds = Shortcode::fields()->getIds('service_category_ids', $shortcode))) {
            return null;
        }

        $serviceCategories = ServiceCategory::query()
            ->with(['metadata', 'slugable'])
            ->wherePublished()
            ->whereIn('id', $serviceCategoryIds)
            ->get();

        if ($serviceCategories->isEmpty()) {
            return null;
        }

        return Theme::partial('shortcodes.service-categories.index', compact('shortcode', 'serviceCategories'));
    });

    Shortcode::setAdminConfig('service-categories', function (array $attributes) {
        $serviceCategories = ServiceCategory::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'style',
                UiSelectorField::class,
                UiSelectorFieldOption::make()
                    ->choices(
                        collect(range(1, 3))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/shortcodes/service-categories/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($attributes, 'style', 'style-1'))
                    ->withoutAspectRatio()
                    ->numberItemsPerRow(1)
                    ->toArray()
            )
            ->add(
                'service_category_ids',
                SelectField::class,
                SelectFieldOption::make()
                    ->choices($serviceCategories)
                    ->selected(explode(',', Arr::get($attributes, 'service_category_ids')))
                    ->label(__('Chooses service categories'))
                    ->searchable()
                    ->multiple()
                    ->toArray()
            )
            ->add(
                'background_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background image'))
                    ->toArray()
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->toArray(),
            );
    });

    Shortcode::register('projects', __('Projects'), __('Projects'), function (ShortcodeCompiler $shortcode): ?string {
        if (! ($projectIds = Shortcode::fields()->getIds('project_ids', $shortcode))) {
            return null;
        }

        $projects = Project::query()
            ->with(['metadata', 'slugable'])
            ->wherePublished()
            ->whereIn('id', $projectIds)
            ->get();

        if ($projects->isEmpty()) {
            return null;
        }

        return Theme::partial('shortcodes.projects.index', compact('shortcode', 'projects'));
    });

    Shortcode::setAdminConfig('projects', function (array $attributes) {
        $projects = Project::query()
            ->wherePublished()
            ->pluck('name', 'id')
            ->all();

        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'style',
                UiSelectorField::class,
                UiSelectorFieldOption::make()
                    ->choices(
                        collect(range(1, 4))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/shortcodes/projects/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($attributes, 'style', 'style-1'))
                    ->withoutAspectRatio()
                    ->numberItemsPerRow(1)
                    ->toArray()
            )
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'subtitle',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Subtitle'))
                    ->toArray()
            )
            ->add('description', TextareaField::class, DescriptionFieldOption::make())
            ->add(
                'project_ids',
                SelectField::class,
                SelectFieldOption::make()
                    ->choices($projects)
                    ->selected(explode(',', Arr::get($attributes, 'project_ids')))
                    ->label(__('Chooses projects'))
                    ->searchable()
                    ->multiple()
                    ->toArray()
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button label'))
                    ->toArray()
            )
            ->add(
                'button_url',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button URL'))
                    ->toArray()
            )
            ->add(
                'background_image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Background image'))
                    ->toArray()
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
                    ->toArray(),
            );
    });
});
