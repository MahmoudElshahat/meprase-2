<?php

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\UiSelectorFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Base\Forms\FormCollapse;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Theme\Facades\Theme;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;

class SiteInformationWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Site Information'),
            'description' => __('Add a site information to your widget area.'),
            'items' => [],
        ]);
    }

    protected function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'style',
                UiSelectorField::class,
                UiSelectorFieldOption::make()
                    ->choices(
                        collect(range(1, 3))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/widgets/site-information/$style.png"),
                                ],
                            ])
                            ->toArray()
                    )
                    ->selected(Arr::get($this->getConfig(), 'style', 'style-1'))
                    ->withoutAspectRatio()
                    ->numberItemsPerRow(1)
                    ->toArray()
            )
            ->add(
                'logo',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Logo'))
                    ->helperText(__('Leave blank to use the default logo.'))
            )
            ->add(
                'description',
                TextareaField::class,
                DescriptionFieldOption::make(),
            )
            ->add(
                'items',
                ShortcodeTabsField::class,
                ShortcodeTabsFieldOption::make()
                    ->fields([
                        'title' => [
                            'title' => __('Title'),
                        ],
                        'description' => [
                            'type' => 'textarea',
                            'title' => __('Description'),
                        ],
                        'icon' => [
                            'title' => __('Icon'),
                            'type' => 'coreIcon',
                        ],
                        'icon_image' => [
                            'title' => __('Icon image'),
                            'type' => 'image',
                        ],
                    ])
                    ->attrs($this->getConfig())
                    ->toArray()
            )
            ->addCollapsible(
                FormCollapse::make('display_social_links')
                    ->targetField(
                        'display_social_links',
                        OnOffField::class,
                        OnOffFieldOption::make()
                            ->label(__('Display Social Links?'))
                            ->toArray()
                    )
                ->fieldset(function (WidgetForm $form) {
                    $form->add(
                        'display_social_links_alert',
                        AlertField::class,
                        AlertFieldOption::make()
                            ->content(__('You can edit your social links in the Appearance → Theme Options → Social Links.'))
                            ->toArray()
                    );
                })->isOpened((bool) Arr::get($this->getConfig(), 'display_social_links'))
            );
    }
}
