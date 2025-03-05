<?php

use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\UiSelectorFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\UiSelectorField;
use Botble\Newsletter\Forms\Fronts\NewsletterForm;
use Botble\Theme\Facades\Theme;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;

class NewsletterWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Newsletter'),
            'description' => __('Add a newsletter to your widget area.'),
            'title' => null,
            'subtitle' => null,
            'image' => null,
            'position' => 'footer',
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
                        collect(range(1, 4))
                            ->mapWithKeys(fn ($number) => [
                                ($style = "style-$number") => [
                                    'label' => __('Style :number', ['number' => $number]),
                                    'image' => Theme::asset()->url("images/widgets/newsletter/$style.png"),
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
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Description'))
                    ->toArray()
            )
            ->add(
                'image',
                MediaImageField::class,
                MediaImageFieldOption::make()
                    ->label(__('Image'))
                    ->toArray()
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->label(__('Background color'))
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
                'display_social_links',
                OnOffField::class,
                OnOffFieldOption::make()
                    ->label(__('Display Social Links?'))
                    ->toArray()
            );

    }

    public function data(): array
    {
        $form = NewsletterForm::create();

        $style = Arr::get($this->getConfig(), 'style');
        $style = in_array($style, ['style-1', 'style-2']) ? $style : 'style-1';

        switch ($style) {
            case 'style-2':
                $form
                    ->modify('submit', 'submit', ['attr' => ['class' => 'btn btn-two'], 'label' => __('Subscribe')], true);

                break;
            default:
                $form
                    ->setFormInputWrapperClass('form-grp w-100')
                    ->modify('submit', 'submit', ['attr' => ['class' => 'btn'], 'label' => __('Submit')], true);

                break;
        }

        return compact('form');
    }

    protected function requiredPlugins(): array
    {
        return ['newsletter'];
    }
}
