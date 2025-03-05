<?php

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\FieldOptions\ShortcodeTabsFieldOption;
use Botble\Shortcode\Forms\Fields\ShortcodeTabsField;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Theme\Facades\Theme;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;

if (! is_plugin_active('contact')) {
    return;
}

Event::listen(RouteMatched::class, function () {
    add_filter(CONTACT_FORM_TEMPLATE_VIEW, function () {
        return Theme::getThemeNamespace('partials.shortcodes.contact-form.index');
    }, 120);

    Shortcode::setPreviewImage('contact-form', Theme::asset()->url('images/ui-blocks/contact-form.png'));

    Shortcode::modifyAdminConfig('contact-form', function (ShortcodeForm $form) {
        $attributes = is_array($form->getModel()) ? $form->getModel() : [];

        $form
            ->withLazyLoading()
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
                DescriptionFieldOption::make()
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
                        'icon' => [
                            'title' => __('Icon'),
                            'type' => 'coreIcon',
                        ],
                        'icon_image' => [
                            'title' => __('Icon image'),
                            'type' => 'image',
                        ],
                        'description' => [
                            'title' => __('Description'),
                            'type' => 'textarea',
                        ],
                    ])
                    ->toArray()
            )
            ->add(
                'open_contact_form_fieldset',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content('<fieldset class="form-fieldset">')
                    ->toArray()
            )
            ->add(
                'contact_form_alert',
                AlertField::class,
                AlertFieldOption::make()
                    ->content(__('Contact form information config'))
                    ->toArray()
            )
            ->add(
                'form_title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Form title'))
                    ->toArray()
            )
            ->add(
                'form_description',
                TextareaField::class,
                TextareaFieldOption::make()
                    ->label(__('Form description'))
                    ->toArray()
            )
            ->add(
                'form_button_label',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Form button label'))
                    ->toArray()
            )
            ->add(
                'closed_contact_form_fieldset',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content('</fieldset>')
                    ->toArray()
            )
        ;

        return $form;
    });
});
