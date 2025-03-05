<?php

use ArchiElite\Career\Forms\CareerForm;
use Botble\ACL\Forms\ProfileForm;
use Botble\Base\Forms\FieldOptions\CoreIconFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\MediaImageFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\CoreIconField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\MediaImageField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Media\Facades\RvMedia;
use Botble\Portfolio\Forms\Fronts\QuotationForm;
use Botble\Portfolio\Forms\PackageForm;
use Botble\Portfolio\Forms\ProjectForm;
use Botble\Portfolio\Forms\ServiceCategoryForm;
use Botble\Portfolio\Forms\ServiceForm;
use Botble\Portfolio\Http\Requests\PackageRequest;
use Botble\SimpleSlider\Forms\SimpleSliderItemForm;
use Botble\SimpleSlider\Http\Requests\SimpleSliderItemRequest;
use Botble\Support\Http\Requests\Request;
use Botble\Testimonial\Forms\TestimonialForm;
use Botble\Testimonial\Http\Requests\TestimonialRequest;
use Botble\Theme\Facades\Theme;
use Botble\Theme\Supports\ThemeSupport;
use Botble\Theme\Typography\TypographyItem;

app()->booted(function () {
    register_page_template([
        'default' => __('Default'),
        'full-width' => __('Full Width'),
        'homepage' => __('Homepage'),
    ]);

    register_sidebar([
        'id' => 'menu_sidebar',
        'name' => __('Menu sidebar'),
        'description' => __('The widget for the sidebar display is located at menu sidebar.'),
    ]);

    register_sidebar([
        'id' => 'header_top_start_sidebar',
        'name' => __('Header top start sidebar'),
        'description' => __('The widget for the top start sidebar is located at top start sidebar.'),
    ]);

    register_sidebar([
        'id' => 'header_top_end_sidebar',
        'name' => __('Header top end sidebar'),
        'description' => __('The widget for the top end sidebar is located at top end sidebar.'),
    ]);

    register_sidebar([
        'id' => 'top_footer_sidebar',
        'name' => __('Top footer sidebar'),
        'description' => __('The widget for the sidebar display is located at the top of the footer.'),
    ]);

    register_sidebar([
        'id' => 'footer_sidebar',
        'name' => __('Footer sidebar'),
        'description' => __('The widget for the sidebar display is located at the footer.'),
    ]);

    register_sidebar([
        'id' => 'bottom_footer_sidebar',
        'name' => __('Bottom footer sidebar'),
        'description' => __('The widget for the sidebar display is located at the bottom of the footer.'),
    ]);

    register_sidebar([
        'id' => 'blog_sidebar',
        'name' => __('Blog sidebar'),
        'description' => __('The widget is located on the sidebar of blog page, offering easy access to our latest posts, updates, and engaging content.'),
    ]);

    register_sidebar([
        'id' => 'product_sidebar',
        'name' => __('Product sidebar'),
        'description' => __('The widget is located on the sidebar of product page.'),
    ]);

    register_sidebar([
        'id' => 'service_sidebar',
        'name' => __('Service sidebar'),
        'description' => __('The widget as a handy navigation hub, offering quick access to information about our various services, ensuring you can easily explore and learn more about what we offer'),
    ]);

    Theme::typography()
        ->registerFontFamily(new TypographyItem('primary', __('Primary'), 'Inter'))
        ->registerFontFamily(new TypographyItem('secondary', __('Secondary'), 'Outfit'));

    ThemeSupport::registerSocialSharing();
    ThemeSupport::registerSocialLinks();
    ThemeSupport::registerToastNotification();
    ThemeSupport::registerLazyLoadImages();
    ThemeSupport::registerPreloader();
    ThemeSupport::registerDateFormatOption();
    ThemeSupport::registerSiteCopyright();
    ThemeSupport::registerSiteLogoHeight();

    add_filter('theme_preloader_versions', function (): array {
        return [
            'v2' => __('Default'),
            'v1' => __('Simplify'),
        ];
    }, 128);

    add_filter('theme_preloader', function (string $preloader): string {
        if (theme_option('preloader_version', 'v2') === 'v2') {
            return Theme::partial('preloader');
        }

        return $preloader;
    }, 128);

    add_filter('widget_menu_admin_config', function (array $data) {
        $data['fields'][] = [
            'type' => 'coreIcon',
            'label' => __('Icon'),
            'attributes' => [
                'name' => 'icon',
                'value' => null,
            ],
        ];

        $data['fields'][] = [
            'type' => 'mediaImage',
            'label' => __('Icon image'),
            'attributes' => [
                'name' => 'icon_image',
                'value' => null,
            ],
        ];

        return $data;
    }, 999);

    RvMedia::addSize('small-rectangle', 320, 240)
        ->addSize('medium-rectangle', 850, 480)
        ->addSize('medium-square', 480, 480);

    ProfileForm::extend(function (ProfileForm $form) {
        $form->add(
            'bio',
            TextareaField::class,
            TextareaFieldOption::make()
                ->label(__('Bio'))
                ->metadata()
                ->colspan(2)
        );
    });

    if (is_plugin_active('portfolio')) {
        ProjectForm::extend(function (ProjectForm $form) {
            return $form
                ->addAfter(
                    'title',
                    'category',
                    TextField::class,
                    TextFieldOption::make()
                        ->metadata()
                        ->label(__('Category'))
                        ->toArray()
                );
        });

        FormAbstract::extend(function (FormAbstract $form) {
            if ($form instanceof ServiceForm || $form instanceof ServiceCategoryForm) {
                $form
                    ->add(
                        'icon',
                        CoreIconField::class,
                        CoreIconFieldOption::make()
                            ->label(__('Icon'))
                            ->metadata()
                            ->toArray()
                    )
                    ->add(
                        'icon_image',
                        MediaImageField::class,
                        MediaImageFieldOption::make()
                            ->label(__('Icon image  (It will override icon above if set)'))
                            ->metadata()
                            ->toArray()
                    );
            }

            return  $form;
        });

        QuotationForm::extend(function (QuotationForm $form) {
            $priceFieldName = null;

            foreach ($form->getFields() as $field) {
                if ($field instanceof NumberField && $field->getOption('label') == 'Price') {
                    $priceFieldName = $field->getName();
                }
            }

            return $form
                ->setFormInputWrapperClass('form-grp')
                ->setFormInputClass('')
                ->modify('submit', 'submit', ['attr' => ['class' => 'btn'], 'label' => theme_option('quotation_form_button_label', __('Submit'))], true)
                ->when($priceFieldName, function (QuotationForm $form) use ($priceFieldName) {
                    $form
                        ->modify(
                            $priceFieldName,
                            HtmlField::class,
                            HtmlFieldOption::make()
                                ->label(false)
                                ->content(Theme::partial('portfolio.forms.price', ['name' => $priceFieldName]))
                                ->toArray()
                        );
                });
        });
    }

    if (is_plugin_active('simple-slider')) {
        add_filter('core_request_rules', function (array $rules, Request $request) {
            if ($request instanceof SimpleSliderItemRequest) {
                return array_merge($rules, [
                    'subtitle' => ['nullable', 'string', 'max:255'],
                    'button_label' => ['nullable', 'string', 'max:255'],
                    'data_count' => ['required', 'int', 'min:1'],
                    'data_count_description' => ['nullable', 'string', 'max:1000'],
                ]);
            }

            return $rules;
        }, 120, 2);

        SimpleSliderItemForm::extend(function (SimpleSliderItemForm $form) {
            return $form
                ->addAfter(
                    'title',
                    'subtitle',
                    TextField::class,
                    TextFieldOption::make()
                        ->metadata()
                        ->label(__('Subtitle'))
                        ->toArray()
                )
                ->addAfter(
                    'link',
                    'button_label',
                    TextField::class,
                    TextFieldOption::make()
                        ->metadata()
                        ->label(__('Button label'))
                        ->toArray()
                )
                ->addAfter(
                    'description',
                    'data_count',
                    NumberField::class,
                    NumberFieldOption::make()
                        ->metadata()
                        ->label(__('Data count'))
                        ->toArray()
                )
                ->addAfter(
                    'data_count',
                    'data_count_description',
                    TextField::class,
                    TextFieldOption::make()
                        ->metadata()
                        ->label(__('Data count description'))
                        ->toArray()
                );
        });
    }

    if (is_plugin_active('testimonial')) {
        add_filter('core_request_rules', function (array $rules, Request $request) {
            if ($request instanceof TestimonialRequest) {
                return array_merge($rules, [
                    'rating_star' => ['required', 'numeric', 'min:1', 'max:5'],
                ]);
            }

            return $rules;
        }, 120, 2);

        TestimonialForm::extend(function (TestimonialForm $form) {
            return $form
                ->addAfter(
                    'company',
                    'rating_star',
                    NumberField::class,
                    NumberFieldOption::make()
                        ->attributes(['min' => 1, 'max' => 5])
                        ->metadata()
                        ->label(__('Rating star'))
                        ->toArray()
                );
        });
    }

    if (is_plugin_active('career')) {
        CareerForm::extend(function (CareerForm $form) {
            return $form
                ->addAfter(
                    'status',
                    'image',
                    MediaImageField::class,
                    MediaImageFieldOption::make()
                        ->label(__('Image'))
                        ->metadata()
                )
                ->addAfter(
                    'image',
                    'icon',
                    CoreIconField::class,
                    CoreIconFieldOption::make()
                        ->label(__('Icon'))
                        ->metadata()
                )
                ->addAfter(
                    'icon',
                    'icon_image',
                    MediaImageField::class,
                    MediaImageFieldOption::make()
                        ->label(__('Icon Image (It will override icon above if set)'))
                        ->metadata()
                )
                ->addAfter(
                    'salary',
                    'apply_url',
                    TextField::class,
                    TextFieldOption::make()
                        ->label(__('Apply URL'))
                        ->metadata()
                );
        });
    }

    if (is_plugin_active('ecommerce')) {
        EcommerceHelper::registerThemeAssets();
    }
});
