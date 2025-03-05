<?php

namespace Botble\Ecommerce\Http\Requests;

use Botble\Base\Rules\EmailRule;
use Botble\Ecommerce\Models\Customer;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class CustomerCreateRequest extends Request
{
    public function rules(): array
    {
      return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', new EmailRule(), Rule::unique((new Customer())->getTable(), 'email')],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'private_notes' => ['nullable', 'string', 'max:1000'],
            'national' => ['required', 'numeric','max:120'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'max:120'],
            'speciality' => ['required', 'max:120'],
            'gender' => ['required', 'in:male,female,other'],
            'phone' => ['required', 'string', 'min:10', 'max:15'],
            'birthday' => 'nullable',
        ];
    }
}
