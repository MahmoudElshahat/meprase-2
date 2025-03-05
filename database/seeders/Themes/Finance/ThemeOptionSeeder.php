<?php

namespace Database\Seeders\Themes\Finance;

class ThemeOptionSeeder extends \Database\Seeders\Themes\Main\ThemeOptionSeeder
{
    public function getThemeOptions(): array
    {
        return [
            ...parent::getThemeOptions(),
            'header_style' => '2',
            'header_top_background_color' => '#ffffff',
            'header_top_text_color' => '#0e104b',
            'footer_background_color' => '#0e104b',
            'footer_heading_color' => '#ffffff',
            'footer_text_color' => '#b8b9da',
            'footer_border_color' => '#272A68',
            'footer_bottom_background_color' => '#0e104b',
            'is_header_transparent' => false,
            'header_action_buttons' => [
                [
                    [
                        'key' => 'label',
                        'value' => 'Get In Touch',
                    ],
                    [
                        'key' => 'url',
                        'value' => '/contact-us',
                    ],
                    [
                        'key' => 'icon',
                        'value' => 'ti ti-message-circle',
                    ],
                ],
            ],
        ];
    }
}
