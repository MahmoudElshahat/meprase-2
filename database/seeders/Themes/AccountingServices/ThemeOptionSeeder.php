<?php

namespace Database\Seeders\Themes\AccountingServices;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    public function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'is_header_transparent' => false,
            'header_top_background_color' => '#0E104B',
            'header_top_text_color' => '#ffffff',
            'header_text_color' => '#fffff',
            'footer_background_color' => '#0e104b',
            'footer_heading_color' => '#ffffff',
            'footer_text_color' => '#b8b9da',
            'footer_border_color' => '#272A68',
            'footer_bottom_background_color' => '#0e104b',
        ];
    }
}
