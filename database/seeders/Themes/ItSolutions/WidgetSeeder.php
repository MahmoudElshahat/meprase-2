<?php

namespace Database\Seeders\Themes\ItSolutions;

use Botble\Widget\Widgets\CoreSimpleMenu;

class WidgetSeeder extends \Database\Seeders\Themes\Main\WidgetSeeder
{
    public function getDataTopFooterSidebar(): array
    {
        return [];
    }

    public function getDataFooterSidebar(): array
    {
        return [
            [
                'widget_id' => 'NewsletterWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'NewsletterWidget',
                    'title' => 'Never Miss Out On A Moment Apexa Us',
                    'background_color' => 'transparent',
                    'display_social_links' => true,
                    'style' => 'style-4',
                ],
            ],
            [
                'widget_id' => CoreSimpleMenu::class,
                'sidebar_id' => 'footer_sidebar',
                'position' => 2,
                'data' => [
                    'id' => CoreSimpleMenu::class,
                    'name' => 'Information',
                    'items' => [
                        [
                            [
                                'key' => 'label',
                                'value' => '+123 888 9999',
                            ],
                            [
                                'key' => 'url',
                                'value' => 'tel:+123 888 9999',
                            ],
                            [
                                'key' => 'icon',
                                'value' => 'ti ti-phone-call',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'info@apexa.com',
                            ],
                            [
                                'key' => 'url',
                                'value' => 'mailto:info@apexa.com',
                            ],
                            [
                                'key' => 'icon',
                                'value' => 'ti ti-mail',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Sydney Harbour Bridge Circular City of Sydney, Australia.',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/',
                            ],
                            [
                                'key' => 'icon',
                                'value' => 'ti ti-map-pin',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'widget_id' => CoreSimpleMenu::class,
                'sidebar_id' => 'footer_sidebar',
                'position' => 3,
                'data' => [
                    'id' => CoreSimpleMenu::class,
                    'name' => 'Top Links',
                    'items' => [
                        [
                            [
                                'key' => 'label',
                                'value' => 'How it’s Work',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Partners',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Testimonials',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Case Studies',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Pricing',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'widget_id' => 'GalleriesWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 4,
                'data' => [
                    'id' => 'GalleriesWidget',
                    'title' => 'Instagram Posts',
                    'limit' => 6,
                ],
            ],
        ];
    }

    public function getDataBottomFooterSidebar(): array
    {
        return [
            [
                'widget_id' => 'SiteCopyrightWidget',
                'sidebar_id' => 'bottom_footer_sidebar',
                'position' => 1,
                'data' => [],
            ],
            [
                'widget_id' => 'SocialLinksWidget',
                'sidebar_id' => 'bottom_footer_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'SocialLinksWidget',
                    'style' => 'style-2',
                ],
            ],
        ];
    }
}
