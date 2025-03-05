<?php

namespace Database\Seeders\Themes\ItSolutions;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    public function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'is_header_transparent' => false,
            'header_style' => '4',
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
                [
                    [
                        'key' => 'label',
                        'value' => 'Free Trail',
                    ],
                    [
                        'key' => 'url',
                        'value' => '/contact-us',
                    ],
                ],
            ],
            'footer_background_color' => '#0E104B',
            'footer_bottom_background_color' => '#0E104B',
            'footer_heading_color' => '#ffffff',
            'footer_text_color' => '#b8b9da',
            'footer_border_color' => '#272A68',
        ];
    }
}
