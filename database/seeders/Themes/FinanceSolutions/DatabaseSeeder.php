<?php

namespace Database\Seeders\Themes\FinanceSolutions;

class DatabaseSeeder extends \Database\Seeders\Themes\Main\DatabaseSeeder
{
    public function getSeeders(): array
    {
        return [
            ...parent::getSeeders(),
            ThemeOptionSeeder::class,
            PageSeeder::class,
            TeamSeeder::class,
            WidgetSeeder::class,
        ];
    }
}
