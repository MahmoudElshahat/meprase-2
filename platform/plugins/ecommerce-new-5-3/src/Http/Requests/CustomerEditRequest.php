<?php

namespace Botble\Ecommerce\Http\Requests;

use Botble\Base\Rules\EmailRule;
use Botble\Ecommerce\Models\Customer;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CustomerEditRequest extends Request
{
    public function rules(): array
    {
            $rules = [
            'name' => ['required', 'max:120', 'min:2'],
            'national' => ['required','numeric', 'max:120'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'max:120'],
            'speciality' => ['required', 'max:120'],
            'gender' => ['required', 'in:male,female,other'],
            'phone' => ['required', 'string', 'min:10', 'max:15'],

            'email' => [
                'required',
                new EmailRule(),
                Rule::unique((new Customer())->getTable(), 'email')->ignore($this->route('customer.id')),
            ],
        ];

        if ($this->boolean('is_change_password')) {
            $rules['password'] = 'required|string|min:6';
            $rules['password_confirmation'] = 'required|same:password';
        }

        return $rules;
    }
}
