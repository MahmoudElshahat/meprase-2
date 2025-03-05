<?php

use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Contact\Forms\Fronts\ContactForm;
use Botble\Widget\AbstractWidget;
use Botble\Widget\Forms\WidgetForm;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ContactFormWidget extends AbstractWidget
{
    public function __construct()
    {
        parent::__construct([
            'name' => __('Contact Form'),
            'description' => __('Contact form widget'),
        ]);
    }

    public function data(): array|Collection
    {
        $form = ContactForm::createFromArray(['display_fields' => 'email'])
            ->setFormInputWrapperClass('form-grp')
            ->setFormInputClass('')
            ->modify(
                'submit',
                'submit',
                ['attr' => ['class' => 'btn btn-two'], 'label' => Arr::get($this->getConfig(), 'button_label') ?: __('Submit')],
                true
            );

        $backgroundColor = Arr::get($this->getConfig(), 'background_color');

        return compact('form', 'backgroundColor');
    }

    protected function settingForm(): WidgetForm|string|null
    {
        return WidgetForm::createFromArray($this->getConfig())
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
            )
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button label'))
            )
            ->add(
                'background_color',
                ColorField::class,
                ColorFieldOption::make()
                    ->defaultValue('#ECF6FA')
                    ->label(__('Background color'))
            );
    }
}
