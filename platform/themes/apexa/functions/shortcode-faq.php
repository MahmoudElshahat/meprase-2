<?php

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\CoreIconFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\CoreIconField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Faq\FaqCollection;
use Botble\Faq\FaqItem;
use Botble\Faq\FaqSupport;
use Botble\Faq\Models\Faq;
use Botble\Faq\Models\FaqCategory;
use Botble\Shortcode\Compilers\Shortcode as ShortcodeCompiler;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Shortcode\Forms\ShortcodeForm;
use Botble\Theme\Facades\Theme;
use Illuminate\Support\Arr;

if (! is_plugin_active('faq')) {
    return;
}

app()->booted(callback: function () {
    Shortcode::register('faqs', __('FAQs'), __('FAQs'), function (ShortcodeCompiler $shortcode) {
        $query = Faq::query();

        $categoryIds = Shortcode::fields()->getIds('faq_category_ids', $shortcode);

        if ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        }

        $faqs = $query
            ->wherePublished()
            ->orderByDesc('created_at')
            ->limit($shortcode->limit ?: 4)
            ->get();

        if (setting('enable_faq_schema', false)) {
            $schemaItems = new FaqCollection();

            foreach ($faqs as $faq) {
                $schemaItems->push(new FaqItem($faq->question, $faq->answer));
            }

            app(FaqSupport::class)->registerSchema($schemaItems);
        }

        return Theme::partial('shortcodes.faqs.index', compact('shortcode', 'faqs'));
    });

    Shortcode::setPreviewImage('faqs', Theme::asset()->url('images/ui-blocks/faqs.png'));

    Shortcode::setAdminConfig('faqs', function (array $attributes) {
        $faqCategories = FaqCategory::query()
            ->wherePublished()
            ->orderByDesc('created_at')
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
                'description',
                TextareaField::class,
                DescriptionFieldOption::make()
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
                'faq_category_ids',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Choose Faq Categories'))
                    ->searchable()
                    ->multiple()
                    ->selected(explode(',', Arr::get($attributes, 'faq_category_ids')))
                    ->choices($faqCategories)
                    ->toArray()
            )
            ->add(
                'limit',
                NumberField::class,
                NumberFieldOption::make()
                    ->label(__('Limit'))
                    ->defaultValue(4)
                    ->toArray()
            )
            ->add(
                'open_floating_block_fieldset',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content('<fieldset class="form-fieldset">')
            )
            ->add(
                'alert_floating_block',
                AlertField::class,
                AlertFieldOption::make()
                    ->content(__('Floating Block'))
                    ->toArray()
            )
            ->add(
                'floating_block_icon',
                CoreIconField::class,
                CoreIconFieldOption::make()
                    ->label(__('Icon'))
                    ->toArray()
            )
            ->add(
                'floating_block_title',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Title'))
                    ->toArray()
            )
            ->add(
                'floating_block_description',
                TextareaField::class,
                DescriptionFieldOption::make()
                    ->toArray()
            )
            ->add(
                'closed_floating_block_fieldset',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->content('</fieldset>')
            )
        ;

    });
});
