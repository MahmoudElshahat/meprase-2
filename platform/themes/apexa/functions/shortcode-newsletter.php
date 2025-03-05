<?php

use Botble\Base\Forms\FieldOptions\ColorFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\ColorField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Newsletter\Forms\Fronts\NewsletterForm;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Theme\Facades\Theme;

if (! is_plugin_active('newsletter')) {
    return;
}

app()->booted(function () {
    Shortcode::register('newsletter', __('Newsletter'), __('Newsletter'), function (ShortcodeCompiler $shortcode): ?string {
        $form = NewsletterForm::create()
            ->setFormInputWrapperClass('form-grp w-100')
            ->modify('submit', 'submit', ['attr' => ['class' => 'btn'], 'label' => $shortcode->button_label ?: __('Submit')], true);

        return Theme::partial('shortcodes.newsletter.index', compact('shortcode', 'form'));
    });

    Shortcode::setAdminConfig('newsletter', function (array $attributes) {
        return ShortcodeForm::createFromArray($attributes)
            ->withLazyLoading()
            ->add(
                'title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add('description', TextareaField::class, DescriptionFieldOption::make())
            ->add(
                'button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Button label'))
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
