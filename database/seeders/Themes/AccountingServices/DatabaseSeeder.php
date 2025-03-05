<?php

namespace Database\Seeders\Themes\AccountingServices;

class DatabaseSeeder extends \Database\Seeders\Themes\Main\DatabaseSeeder
{
    public function getSeeders(): array
    {
        return [
            ...parent::getSeeders(),
            PageSeeder::class,
            ThemeOptionSeeder::class,
            WidgetSeeder::class,
        ];
    }
}
