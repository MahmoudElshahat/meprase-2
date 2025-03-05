<?php

namespace Botble\Ecommerce\Forms\Fronts\Auth;

use Botble\Base\Facades\Html;
use Botble\Ecommerce\Models\Customer;
use Botble\Base\Forms\Fields\DateField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\EmailField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\PasswordField;
use Botble\Ecommerce\Facades\EcommerceHelper;
use Botble\Base\Forms\Fields\PhoneNumberField;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\FieldOptions\DateFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Ecommerce\Http\Requests\RegisterRequest;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\CheckboxFieldOption;
use Botble\Ecommerce\Forms\Fronts\Auth\FieldOptions\TextFieldOption;
use Botble\Ecommerce\Forms\Fronts\Auth\FieldOptions\EmailFieldOption;
use Botble\Location\Models\Country;

class RegisterForm extends AuthForm
{
    public static function formTitle(): string
    {
        return __('Customer register form');
    }

    public function setup(): void
    {
        $countries=Country::all();
        $countryChoices = $countries->pluck('name', 'id')->toArray();

        $countryChoices = ['' => __('Select Nationality')] + $countryChoices; //plachoder
        parent::setup();

        $this
            ->setUrl(route('customer.register.post'))
            ->setValidatorClass(RegisterRequest::class)
            // ->icon('ti ti-user-plus')
            ->heading(__('Register an account'))
            ->description(__('Your personal data will be used to support your experience throughout this website, to manage access to your account.'))
            ->when(
                theme_option('register_background'),
                fn (AuthForm $form, string $background) => $form->banner($background)
            )
            ->add(
                'name',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Full name'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->placeholder(__('Your full name'))
                    ->icon('ti ti-user')
            )
            ->add(
                'national',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('National ID'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->placeholder(__('Your National ID'))
                    ->icon('ti ti-user')
            )
            ->add(
                'email',
                EmailField::class,
                EmailFieldOption::make()
                    ->label(__('Email'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->when(EcommerceHelper::isLoginUsingPhone(), function (EmailFieldOption $fieldOption) {
                        $fieldOption->label(__('Email (optional)'));
                    })
                    ->placeholder(__('Your email'))
                    ->icon('ti ti-mail')
                    ->addAttribute('autocomplete', 'email')
            )
            // ->add(
            //     'country_code',
            //     TextFieldOption::class,
            //     TextFieldOption::make()
            //         ->label(__('Country Code'))
            //         // ->choices([
            //         //     '+355' => '+355', '+213' => '+213', '+376' => '+376', '+244' => '+244',
            //         //     '+54' => '+54', '+374' => '+374', '+61' => '+61', '+43' => '+43',
            //         //     '+994' => '+994', '+973' => '+973', '+880' => '+880', '+32' => '+32',
            //         //     // Add more country codes here...
            //         //     '+20' => '+20' // Default selected country (Egypt in this case)
            //         // ])
            //         ->addAttribute('class', 'country_code_Alternative')
            //         ->addAttribute('id', 'country-code-Alternative')
            // )
            ->add(
                'phone',
                PhoneNumberField::class,
                TextFieldOption::make()
                    ->labelAttributes(['class' => 'text-white'])
                    ->when(EcommerceHelper::isLoginUsingPhone() || get_ecommerce_setting('make_customer_phone_number_required', false), function (TextFieldOption $fieldOption) {
                        $fieldOption
                            ->required()
                            ->label(__('Phone'));
                    })
                    ->placeholder(__('Phone number'))
                    ->addAttribute('autocomplete', 'tel')
                    ->addAttribute('class', 'phone-number-field')  // Add class for JS targeting
                    ->addAttribute('id', 'phone-input')  // ID for phone input
            )


            ->add(
                'gender',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Gender'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->choices([  // Use the existing 'choices' method to set options
                        'male' => __('Male'),
                        'female' => __('Female'),
                    ])
                    // ->placeholder(__('Select Gender')),
                    // ->icon('ti ti-gender'),
            )

            ->add(
                'birthday',
                DateField::class,
                TextFieldOption::make()
                    ->label(__('Birthday'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->placeholder(__('Select Date'))
                    ->icon('ti ti-calendar')
            )
            ->add(
                'nationality',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Nationality'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->choices($countryChoices)
                    ->searchable()
                    ->allowClear()

            )


            ->add(
                'speciality',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Speciality'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->placeholder(__('Enter Your Speciality'))
                    ->icon('ti ti-user')
            )

            ->add(
                'password',
                PasswordField::class,
                TextFieldOption::make()
                    ->label(__('Password'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->placeholder(__('Password'))
                    ->icon('ti ti-lock')
            )
            ->add(
                'password_confirmation',
                PasswordField::class,
                TextFieldOption::make()
                    ->label(__('Password confirmation'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->placeholder(__('Password confirmation'))
                    ->icon('ti ti-lock')
            )
            ->add(
                'login',
                HtmlField::class,
                HtmlFieldOption::make()
                    ->view('plugins/ecommerce::customers.includes.login-link')
            );


    }
}
