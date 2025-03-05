<?php

namespace Botble\Base\Forms\FieldOptions;

use Botble\Ecommerce\Forms\Fronts\Auth\FieldOptions\HasIcon;

class DateFieldOption extends TextFieldOption
{
    use HasIcon; // Use the trait here

    public static function make(): static
    {
        return parent::make()
            ->addAttribute('type', 'date') // Ensures it's rendered as a date input
            ->maxLength(10); // Typical format: YYYY-MM-DD
    }
}
