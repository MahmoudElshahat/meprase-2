<?php

namespace Botble\Ecommerce\Forms\Fronts\Customer;

use icon;
use Botble\Theme\FormFront;
use Botble\Base\Facades\BaseHelper;
use Botble\Location\Models\Country;
use Illuminate\Support\Facades\App;
use Botble\Ecommerce\Models\Customer;
use Botble\Base\Forms\Fields\DateField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\Fields\EmailField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\PhoneNumberField;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\FieldOptions\EmailFieldOption;
use Botble\Base\Forms\FieldOptions\InputFieldOption;
use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Ecommerce\Http\Requests\EditAccountRequest;

class CustomerForm extends FormFront
{
    public function setup(): void
    {
        $countries=Country::all();
        $countryChoices = $countries->pluck('name', 'id')->toArray();

        $countryChoices = ['' => __('Select Nationality')] + $countryChoices; //plachoder
        parent::setup();
        $this
            ->model(Customer::class)
            ->setUrl(route('customer.edit-account'))
            ->setValidatorClass(EditAccountRequest::class)
            ->contentOnly()
            ->add(
                'name',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Full Name'))
            )
            ->when(get_ecommerce_setting('enabled_customer_dob_field', true), function (CustomerForm $form) {
                $form->add(
                    'dob',
                    TextField::class,
                    InputFieldOption::make()
                        ->addAttribute('id', 'date_of_birth')
                        ->addAttribute('data-date-format', config('core.base.general.date_format.js.date'))
                        ->addAttribute('data-locale', App::getLocale())
                        ->value($this->getModel()->dob ? BaseHelper::formatDate($this->getModel()->dob) : null)
                        ->label(__('Date of birth'))
                );
            })
            ->add(
                'email',
                EmailField::class,
                EmailFieldOption::make()
                    ->disabled()
            )
            ->add(
                'phone',
                PhoneNumberField::class,
                TextFieldOption::make()
                    ->label(__('Phone Number'))
                    ->labelAttributes(['class' => 'text-white'])
                    ->required()
                    ->placeholder(__('Enter your phone number'))
                    ->addAttribute('autocomplete', 'tel')
                    ->addAttribute('id', 'phone-input') 
                    ->addAttribute('class', 'phone-number-field')
            )


            ->add(
                'gender',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Gender'))
                    ->choices([
                        'male' => __('Male'),
                        'female' => __('Female'),
                    ])

            )

            ->add(
                'birthday',
                DateField::class,
                TextFieldOption::make()
                    ->label(__('Birthday'))
                    ->placeholder(__('Select Date'))
            )
            ->add(
                'nationality',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(__('Nationality'))
                    ->choices($countryChoices)
                    ->searchable()
                    ->allowClear()

            )


            ->add(
                'speciality',
                TextField::class,
                TextFieldOption::make()
                    ->label(__('Speciality'))
                    ->placeholder(__('Enter Your Speciality'))
            )

            ->add(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->label(__('Update'))
                    ->cssClass('btn btn-primary')
            );
    }
}
