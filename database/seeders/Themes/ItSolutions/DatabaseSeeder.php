<?php

namespace Database\Seeders\Themes\ItSolutions;

class DatabaseSeeder extends \Database\Seeders\Themes\Main\DatabaseSeeder
{
    public function getSeeders(): array
    {
        return [
            ...parent::getSeeders(),
            PageSeeder::class,
            ThemeOptionSeeder::class,
            TeamSeeder::class,
            WidgetSeeder::class,
        ];
    }
}
