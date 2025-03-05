<?php

namespace Database\Seeders\Themes\DigitalAgency;

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
            'background_color' => '#14176C',
        ]);

        $homepage->update([
            'content' => htmlentities(
                Shortcode::generateShortcode('hero-banner', [
                    'title' => "Agency's Vision For The <span>Next Generation</span> Of Advertising",
                    'description' => 'Apexa helps you to convert your data into a strategic asset and get business insights Apexa helps you to convert.',
                    'button_label' => 'Get Started',
                    'button_url' => '/',
                    'display_social_links' => '0,1',
                    'display_button_scroll_down' => '0,1',
                    'image' => $this->filePath('general/hero-banner-5.png'),
                    'image_1' => $this->filePath('general/hero-banner-5-1.png'),
                    'background_image' => $this->filePath('backgrounds/hero-banner-bg-5.jpg'),
                    'background_color' => 'transparent',
                    'enable_lazy_loading' => 'no',
                ]) .
                $shortcodeBrand .
                Shortcode::generateShortcode('services', [
                    'style' => 'style-4',
                    'title' => 'We Do World Class Work For You',
                    'subtitle' => 'WHAT WE OFFER',
                    'description' => 'Mauris ut enim sit amet lacus ornare ullamcorper Praesent plaacerat neque eu purus rhoncus vel tincidunt odio ultrices.',
                    'service_ids' => '1,2,3,4',
                    'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-5',
                    'title' => "Business Growth Creativity Meet Our Agency's Experts",
                    'subtitle' => 'ABOUT COMPANY',
                    'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master. We successfully cope varying complexity provide area longerty guarantees.',
                    'image' => $this->filePath('general/about-us-information-5.jpg'),
                    'image_1' => $this->filePath('general/about-us-information-5-1.png'),
                    'data_count' => '15',
                    'data_count_description' => 'World Best Agency <br> Award Got',
                    'quantity' => '4',
                    'title_1' => 'Medicare Advantage Plans',
                    'title_2' => 'Analysis & Research',
                    'title_3' => '100% Secure Money Back',
                    'title_4' => '100% Money Growth',
                    'button_label' => 'Contact with Us',
                    'button_url' => '/contact-us',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-6',
                    'title' => 'Providing Expert Advice on Business Consulting, Planning & Success',
                    'subtitle' => 'WHY CHOOSE OUR SERVICE',
                    'description' => 'Mauris ut enim sit amet lacus ornare ullamcorper. Praesent plaacerat neque eu purus rhoncus, vel tincidunt odio ultrices. Seed theya are feugiat elis Curabitur posuere tristique.',
                    'image' => $this->filePath('general/about-us-information-3-1.jpg'),
                    'image_1' => $this->filePath('general/about-us-information-6.jpg'),
                    'image_2' => $this->filePath('general/about-us-information-3-2.jpg'),
                    'quantity' => '2',
                    'title_1' => 'E-mail Marketing',
                    'description_1' => 'Apexa helps youcona doing tempor incididunt.',
                    'icon_1' => 'ti ti-mail',
                    'title_2' => 'Business Growth',
                    'description_2' => 'Apexa helps youcona doing tempor incididunt.',
                    'icon_2' => 'ti ti-device-imac-search',
                    'background_color' => 'transparent',
                ], lazy: true)
                . Shortcode::generateShortcode('projects', [
                    'style' => 'style-2',
                    'project_ids' => '1,2,3,4,5',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('site-statistics', [
                    'style' => 'style-1',
                    'quantity' => '4',
                    'title_1' => 'Successfully Completed Projects',
                    'data_1' => '45',
                    'unit_1' => '+',
                    'image_1' => $this->filePath('icons/trophy.png'),
                    'title_2' => 'Satisfied 100% Our Clients',
                    'data_2' => '92',
                    'unit_2' => 'K',
                    'image_2' => $this->filePath('icons/star.png'),
                    'title_3' => 'All Over The World We Are Available',
                    'data_3' => '19',
                    'unit_3' => '+',
                    'image_3' => $this->filePath('icons/popularity.png'),
                    'title_4' => 'Years of Experiences To Run This Company',
                    'data_4' => '25',
                    'unit_4' => '+',
                    'image_4' => $this->filePath('icons/time.png'),
                    'background_image' => $this->filePath('backgrounds/site-statistics-bg.png'),
                    'background_color' => '#FFFBF3',
                ], lazy: true) .
                Shortcode::generateShortcode('team', [
                    'style' => 'style-1',
                    'team_ids' => '1,2,3,4',
                    'background_color' => 'transparent',
                    'enable_lazy_loading' => 'yes',
                    'subtitle' => 'MEET OUR TEAM',
                    'title' => 'Financial Expertise You <br> Can Trust',
                    'description' => 'Our power of choice is untrammelled and when nothing preven tsbeing able to do what we like best every pleasure.',
                ], lazy: true) .
                Shortcode::generateShortcode('consulting-block', [
                    'title' => 'Trusted , Happy & Satisfied Businesses',
                    'description' => 'When you work with HR Solutions, you get the best. We provide adaptable solutions that allow you to be a part of the entire process',
                    'image' => $this->filePath('general/consulting-block.jpg'),
                    'data_count' => '40+',
                    'data_count_description' => 'Consulting <br> farm',
                    'background_color' => 'rgb(25, 29, 136)',
                ]) .
                Shortcode::generateShortcode('pricing', [
                    'title' => 'We’ve Offered The Best Pricing For You',
                    'subtitle' => 'FLEXIBLE PRICING PLAN',
                    'package_ids' => '1,2,3',
                    'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                    'enable_lazy_loading' => 'yes',
                ]) .
                Shortcode::generateShortcode('testimonials', [
                    'style' => 'style-4',
                    'image' => $this->filePath('general/testimonials-4-1.png'),
                    'testimonial_ids' => '1,2,3,4',
                    'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                ], lazy: true) .
                Shortcode::generateShortcode('blog-posts', [
                    'style' => 'style-2',
                    'category_ids' => '1,2,3,4,5',
                    'title' => 'Featured News And Insights',
                    'subtitle' => 'OUR BLOG UPDATE',
                    'limit' => '3',
                    'background_color' => '#FFFBF3',
                    'enable_lazy_loading' => 'yes',
                ], lazy: true)
            ),
        ]);
    }
}
