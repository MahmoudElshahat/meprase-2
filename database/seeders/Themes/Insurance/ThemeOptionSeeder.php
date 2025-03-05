<?php

namespace Database\Seeders\Themes\Insurance;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    public function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'header_style' => '3',
            'header_top_background_color' => 'transparent',
            'header_top_text_color' => '#3e4073',
            'footer_background_color' => '#0e104b',
            'footer_background_image' => '',
            'footer_heading_color' => '#ffffff',
            'footer_text_color' => '#b8b9da',
            'footer_border_color' => '#272A68',
            'footer_bottom_background_color' => '#0e104b',
            'header_action_buttons' => [
                [
                    [
                        'key' => 'label',
                        'value' => 'Login',
                    ],
                    [
                        'key' => 'url',
                        'value' => '/login',
                    ],
                ],
            ],
        ];
    }
}
