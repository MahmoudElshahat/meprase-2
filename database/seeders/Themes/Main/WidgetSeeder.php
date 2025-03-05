<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Widget\Database\Traits\HasWidgetSeeder;
use Botble\Widget\Widgets\CoreSimpleMenu;

class WidgetSeeder extends BaseSeeder
{
    use HasWidgetSeeder;

    public function run(): void
    {
        $this->uploadFiles('downloads');

        $this->createWidgets($this->getWidgets());
    }

    protected function getWidgets(): array
    {
        return [
            ...$this->getDataPrimarySidebar(),
            ...$this->getDataMenuSidebar(),
            ...$this->getDataFooterSidebar(),
            ...$this->getDataTopFooterSidebar(),
            ...$this->getDataBottomFooterSidebar(),
            ...$this->getDataBlogSidebar(),
            ...$this->getDataHeaderTopStartSidebar(),
            ...$this->getDataHeaderTopEndSidebar(),
            ...$this->getDataServiceSidebar(),
        ];
    }

    public function getDataPrimarySidebar(): array
    {
        return [];
    }

    public function getDataMenuSidebar(): array
    {
        return [
            [
                'widget_id' => 'SiteInformationWidget',
                'sidebar_id' => 'menu_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'SiteInformationWidget',
                    'quantity' => 3,
                    'title_1' => 'Office Address',
                    'description_1' => '123/A, Miranda City Likaoli Prikano, Dope',
                    'title_2' => 'Phone Number',
                    'description_2' => '+0989 7876 9865 9 <br> +(090) 8765 86543 85',
                    'title_3' => 'Email Address',
                    'description_3' => 'info@example.com <br> example.mail@hum.com',
                ],
            ],
            [
                'widget_id' => 'SocialLinksWidget',
                'sidebar_id' => 'menu_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'SocialLinksWidget',
                ],
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
                    'description' => 'Felis consquat magnis fames sagittis ultrices plasodales porttitor quisque ultrice tempor turpis.',
                    'background_color' => 'rgb(20, 23, 108)',
                    'display_social_links' => true,
                    'quantity' => 0,
                    'style' => 'style-2',
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
                                'value' => '/how-its-work',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Partners',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/team-one',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Testimonials',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/testimonials',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Case Studies',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/contact-us',
                            ],
                        ],
                        [
                            [
                                'key' => 'label',
                                'value' => 'Pricing',
                            ],
                            [
                                'key' => 'url',
                                'value' => '/pricing',
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

    public function getDataTopFooterSidebar(): array
    {
        return [
            [
                'widget_id' => 'NewsletterWidget',
                'sidebar_id' => 'top_footer_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'NewsletterWidget',
                    'title' => 'Request A Call Back',
                    'description' => 'Ever find yourself staring at your computer screen a good consulting slogan to come to mind? Oftentimes.',
                    'image' => $this->filePath('backgrounds/newsletter-bg.png'),
                    'background_color' => 'rgb(20, 23, 108)',
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

    public function getDataBlogSidebar(): array
    {
        return [
            [
                'widget_id' => 'BlogSearchWidget',
                'sidebar_id' => 'blog_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'BlogSearchWidget',
                ],
            ],
            [
                'widget_id' => 'BlogCategoriesWidget',
                'sidebar_id' => 'blog_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'BlogCategoriesWidget',
                    'title' => 'Categories',
                    'category_ids' => [1, 2, 3, 4, 5],
                ],
            ],
            [
                'widget_id' => 'BlogPostsWidget',
                'sidebar_id' => 'blog_sidebar',
                'position' => 3,
                'data' => [
                    'id' => 'BlogPostsWidget',
                    'title' => 'Latest Posts',
                    'category_ids' => [1, 2, 3, 4, 5],
                    'limit' => 4,
                ],
            ],
            [
                'widget_id' => 'BlogTagsWidget',
                'sidebar_id' => 'blog_sidebar',
                'position' => 4,
                'data' => [
                    'id' => 'BlogTagsWidget',
                    'title' => 'Tags',
                    'limit' => 5,
                ],
            ],
        ];
    }

    public function getDataHeaderTopStartSidebar(): array
    {
        return [
            [
                'widget_id' => 'ContactInformationWidget',
                'sidebar_id' => 'header_top_start_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'ContactInformationWidget',
                    'quantity' => 2,
                    'title_1' => '+123 9898 500',
                    'icon_1' => 'ti ti-phone-call',
                    'url_1' => 'tel:123 9898 500',
                    'title_2' => '256 Avenue, Mark Street, NewYork City',
                    'icon_2' => 'ti ti-map-pin',
                    'url_2' => 'https://www.google.com/maps/place/256+St+Marks+Ave,+Freeport,+NY+11520,+USA',
                ],
            ],
        ];
    }

    public function getDataHeaderTopEndSidebar(): array
    {
        return [
            [
                'widget_id' => 'ContactInformationWidget',
                'sidebar_id' => 'header_top_end_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'ContactInformationWidget',
                    'quantity' => 2,
                    'title_1' => 'info@apexa.com',
                    'icon_1' => 'ti ti-mail',
                    'url_1' => 'mailto:info@apexa.com',
                    'title_2' => 'Mon-Fri: 10:00am - 09:00pm',
                    'icon_2' => 'ti ti-clock-hour-6',
                    'url_2' => '',
                    'alignment' => 'end',
                ],
            ],
        ];
    }

    public function getDataServiceSidebar(): array
    {
        return [
            [
                'widget_id' => 'ServicesWidget',
                'sidebar_id' => 'service_sidebar',
                'position' => 1,
                'data' => [
                    'id' => 'ServicesWidget',
                    'service_ids' => [1, 2, 3, 4, 5],
                ],
            ],
            [
                'widget_id' => 'BrochureDownloadsWidget',
                'sidebar_id' => 'service_sidebar',
                'position' => 2,
                'data' => [
                    'id' => 'BrochureDownloadsWidget',
                    'title' => 'Brochure',
                    'description' => 'when an unknown printer took ga lley offer typey anddey.',
                    'file_1' => 'downloads/document.pdf',
                    'file_2' => 'downloads/document.pdf',
                ],
            ],
            [
                'widget_id' => 'BlogPostsWidget',
                'sidebar_id' => 'service_sidebar',
                'position' => 3,
                'data' => [
                    'id' => 'BlogPostsWidget',
                    'title' => 'Latest Posts',
                    'category_ids' => [1, 2, 3, 4, 5],
                    'limit' => 4,
                ],
            ],
            [
                'widget_id' => 'ContactBlockWidget',
                'sidebar_id' => 'service_sidebar',
                'position' => 4,
                'data' => [
                    'id' => 'ContactBlockWidget',
                    'title' => 'If You Need Any Help Contact With Us',
                    'phone_number' => '+91 705 2101 786',
                ],
            ],
            [
                'widget_id' => 'ContactFormWidget',
                'sidebar_id' => 'service_sidebar',
                'position' => 5,
                'data' => [
                    'id' => 'ContactFormWidget',
                    'title' => 'Send Us Message',
                    'button_label' => 'Send Message',
                    'background_color' => '#ECF6FA',
                ],
            ],
        ];
    }
}
