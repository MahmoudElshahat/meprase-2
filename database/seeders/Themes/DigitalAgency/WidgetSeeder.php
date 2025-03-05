<?php

namespace Database\Seeders\Themes\DigitalAgency;

use Botble\Widget\Widgets\CoreSimpleMenu;

class WidgetSeeder extends \Database\Seeders\Themes\Main\WidgetSeeder
{
    public function getDataTopFooterSidebar(): array
    {
        return [
            [
                'widget_id' => 'NewsletterWidget',
                'sidebar_id' => 'top_footer_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'NewsletterWidget',
                    'title' => 'Subscribe Newsletter For Latest Updates',
                    'image' => $this->filePath('backgrounds/newsletter-bg.png'),
                    'background_color' => '#0e104b',
                    'display_social_links' => true,
                    'style' => 'style-3',
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
        ];
    }

    public function getDataFooterSidebar(): array
    {
        return [
            [
                'widget_id' => 'SiteInformationWidget',
                'sidebar_id' => 'footer_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'SiteInformationWidget',
                    'logo' => $this->filePath('icons/logo-white.png'),
                    'description' => 'Felis consquat magnis fames sagittis ultrices plasodales porttitor quisque ultrice tempor turpis.',
                    'background_color' => 'rgb(20, 23, 108)',
                    'quantity' => 3,
                    'title_1' => '<a href="tel:123 888 9999"> 123 888 9999 </a>',
                    'icon_1' => 'ti ti-phone-call',
                    'title_2' => '<a href="mailto:info@apexa.com">info@apexa.com</a>',
                    'icon_2' => 'ti ti-mail',
                    'title_3' => 'Sydney Harbour Bridge Circular City of Sydney, Australia.',
                    'icon_3' => 'ti ti-map-pin',
                    'style' => 'style-3',
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
                                'value' => 'About us',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/business-about',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Meet our team',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/team-one',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Latest news',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/blog',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Careers',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/careers',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Contact Us',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/contact-us',
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
}
