<?php

namespace Database\Seeders\Themes\Insurance;

use Botble\Page\Models\Page;
use Botble\Shortcode\Facades\Shortcode;

class PageSeeder extends \Database\Seeders\Themes\Main\PageSeeder
{
    public function run(): void
    {
        parent::run();

        $homepage = Page::query()->where('name', 'Homepage')->firstOrFail();

        $brands = [
            [
                'name' => 'Door Dash',
                'image' => $this->filePath('brands/1.png'),
                'url' => '/',
            ],
            [
                'name' => 'Discord',
                'image' => $this->filePath('brands/1.png'),
                'url' => '/',
            ],
            [
                'name' => 'Airbnb',
                'image' => $this->filePath('brands/1.png'),
                'url' => '/',
            ],
            [
                'name' => 'Norton',
                'image' => $this->filePath('brands/1.png'),
                'url' => '/',
            ],
            [
                'name' => 'Naturewave',
                'image' => $this->filePath('brands/1.png'),
                'url' => '/',
            ],
        ];

        $shortcodeBrandAttributes = [];

        $quantity = 0;

        foreach ($brands as $index => $brand) {
            $quantity++;
            foreach ($brand as $key => $value) {
                $shortcodeBrandAttributes[$key . '_' . $index + 1] = $value;
            }
        }

        $shortcodeBrand = Shortcode::generateShortcode('brands', [
            ...$shortcodeBrandAttributes,
            'quantity' => $quantity,
            'title' => '60% of the top 10 largest Company firms <span>trust Proven for Using Our services & Plan For Their Needs</span>',
            'background_color' => 'transparent',
        ], lazy: true);

        $homepage->update([
            'content' =>
                htmlentities(
                    Shortcode::generateShortcode('hero-banner', [
                        'title' => 'Find The Best Health <br> Insurance Plans For <br> The Whole Family',
                        'subtitle' => '100% TRUSTED INSURANCE COMAPNY',
                        'image' => $this->filePath('general/hero-banner-4.png'),
                        'button_label' => 'Read more',
                        'button_url' => '/',
                        'display_social_links' => '0,1',
                        'display_button_scroll_down' => '0,1',
                        'background_image' => $this->filePath('backgrounds/hero-banner-bg-4.jpg'),
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    Shortcode::generateShortcode('service-categories', [
                        'style' => 'style-2',
                        'service_category_ids' => '1,2,3',
                        'background_color' => 'transparent',
                    ], lazy: true) .
                    $shortcodeBrand .
                    Shortcode::generateShortcode('services-tab', [
                        'title' => 'Discover Our Insurance Services For All',
                        'subtitle' => 'WHAT WE OFFER',
                        'quantity' => '6',
                        'service_id_1' => '1',
                        'title_1' => 'Data Analyst',
                        'description_1' => 'Explore our savings, quality care and wellness solutions to craft the perfect plan for your business when an unknown printer.',
                        'featured_title_1_1' => 'Business Growth',
                        'featured_title_2_1' => '100% Secure',
                        'featured_title_3_1' => 'Business Growth',
                        'service_id_2' => '8',
                        'title_2' => 'Strategy Adviser',
                        'description_2' => 'Explore our savings, quality care and wellness solutions to craft the perfect plan for your business when an unknown printer.',
                        'featured_title_1_2' => 'Business Growth',
                        'featured_title_2_2' => 'Analysis & Research',
                        'featured_title_3_2' => '100% Secure',
                        'service_id_3' => '2',
                        'title_3' => 'Liability Planner',
                        'description_3' => 'Explore our savings, quality care and wellness solutions to craft the perfect plan for your business when an unknown printer.',
                        'featured_title_1_3' => 'Business Growth',
                        'featured_title_2_3' => 'Analysis & Research',
                        'featured_title_3_3' => '100% Secure',
                        'service_id_4' => '12',
                        'title_4' => 'Growth Planner',
                        'description_4' => 'Explore our savings, quality care and wellness solutions to craft the perfect plan for your business when an unknown printer.',
                        'featured_title_1_4' => 'Business Growth',
                        'featured_title_2_4' => 'Analysis & Research',
                        'featured_title_3_4' => '100% Secure',
                        'service_id_5' => '7',
                        'title_5' => 'Insurance Expert',
                        'description_5' => 'Explore our savings, quality care and wellness solutions to craft the perfect plan for your business when an unknown printer.',
                        'featured_title_1_5' => 'Business Growth',
                        'featured_title_2_5' => 'Analysis & Research',
                        'featured_title_3_5' => '100% Secure',
                        'service_id_6' => '10',
                        'title_6' => 'Operations Expert',
                        'description_6' => 'Explore our savings, quality care and wellness solutions to craft the perfect plan for your business when an unknown printer.',
                        'featured_title_1_6' => 'Business Growth',
                        'featured_title_2_6' => 'Analysis & Research',
                        'featured_title_3_6' => '100% Secure',
                        'button_label' => 'See More Services',
                        'button_url' => '/services',
                        'background_image' => $this->filePath('backgrounds/services-bg-3.jpg'),
                        'background_color' => 'transparent',
                    ], lazy: true) .
                    Shortcode::generateShortcode('about-us-information', [
                        'style' => 'style-4',
                        'title' => 'Insurance For The Better Family & Corporate Life',
                        'subtitle' => 'ABOUT US',
                        'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master new Practice Following gies heur portfolio includes.',
                        'image' => $this->filePath('general/about-us-information-4-1.jpg'),
                        'image_1' => $this->filePath('general/about-us-information-4-2.jpg'),
                        'quantity' => '3',
                        'title_1' => 'Medicare Advantage Plans',
                        'title_2' => 'Analysis & Research',
                        'title_3' => '100% Secure Money Back',
                        'data_count' => '25',
                        'data_count_description' => 'Years Experience <br>  in This Field',
                        'button_label' => 'Quick Contact Us',
                        'button_url' => '/contact-us',
                        'background_color' => 'transparent',
                    ], lazy: true) .
                    Shortcode::generateShortcode('contact-block', [
                        'style' => 'style-2',
                        'title' => 'Offering The Best Experience Of Finance Services',
                        'subtitle' => 'Toll Free Call',
                        'phone_number' => '+ 88 ( 9600 ) 6002',
                        'button_label' => 'Request A Free Call',
                        'button_url' => 'tel:8896006002',
                        'background_image' => $this->filePath('backgrounds/contact-block-bg-1.jpg'),
                        'background_color' => 'transparent',
                    ], true) .
                    Shortcode::generateShortcode('team', [
                        'subtitle' => 'MEET OUR TEAM',
                        'title' => 'Business Expertise Is Here <br> For You Can Trust',
                        'style' => 'style-4',
                        'team_ids' => '1,2,3,4',
                        'background_color' => 'transparent',
                    ], lazy: true) .
                    Shortcode::generateShortcode('testimonials', [
                        'style' => 'style-5',
                        'testimonial_ids' => '1,2,3,4',
                        'background_color' => 'rgb(20, 23, 108)',
                    ]) .
                    Shortcode::generateShortcode('pricing', [
                        'title' => 'We’ve Offered The Best Pricing For You',
                        'subtitle' => 'FLEXIBLE PRICING PLAN',
                        'package_ids' => '1,2,3',
                        'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                    ], lazy: true) .
                    Shortcode::generateShortcode('blog-posts', [
                        'style' => 'style-1',
                        'category_ids' => '2,3,4,5',
                        'title' => 'Featured News And Insights',
                        'subtitle' => 'OUR BLOG UPDATE',
                        'limit' => '3',
                        'background_color' => 'transparent',
                    ], lazy: true),
                ),
        ]);
    }
}
