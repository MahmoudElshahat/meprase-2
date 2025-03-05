<?php

namespace Database\Seeders\Themes\AccountingServices;

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
            'background_color' => 'transparent',
        ], lazy: true);

        $homepage->update([
            'content' => htmlentities(
                Shortcode::generateShortcode('hero-banner-slider', [
                    'title' => 'Accounting platformusing AI technology',
                    'subtitle' => 'BEST ACCOUNTING SERVICES',
                    'description' => 'Empower decision-making with real-time financial reporting',
                    'simple_slider_key' => 'home-slider',
                    'quantity' => '4',
                    'title_1' => 'Best For IT Consulting',
                    'title_2' => 'Our Vision, Our Mission',
                    'title_3' => 'Save Money & Time',
                    'title_4' => '100% Satisfaction',
                    'team_title' => 'Trusted , Happy & Satisfied Businesses',
                    'team_image' => $this->filePath('general/hero-banner-slider-team.png'),
                    'background_color' => 'rgb(236, 246, 250)',
                ]) .
                $shortcodeBrand .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-7',
                    'title' => 'We Offer Business Insight World Class Consulting',
                    'subtitle' => 'WHY WE ARE THE BEST',
                    'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master new Practice Following gies heur portfolio includes.',
                    'image' => $this->filePath('general/about-us-information-7.png'),
                    'quantity' => '2',
                    'title_1' => 'Finance Planning',
                    'description_1' => 'Apexa helps youcona doing tempor incididunt.',
                    'icon_1' => 'ti ti-chart-bar',
                    'title_2' => 'Market Analysis',
                    'description_2' => 'Apexa helps youcona doing tempor incididunt.',
                    'icon_2' => 'ti ti-coins',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('services', [
                    'style' => 'style-6',
                    'title' => 'Expert Financial and Accounting Services for Businesses',
                    'subtitle' => 'OUR SOLUTIONS',
                    'service_ids' => '1,3,4,5',
                    'background_color' => 'rgb(236, 246, 250)',
                ], lazy: true) .
                Shortcode::generateShortcode('instruction-steps', [
                    'title' => 'Engage With Us For Financial And Accounting Services With This Step-By-Step Guide',
                    'description' => 'Discover how our company can help your business with our comprehensive financial and accounting services. From bookkeeping to tax planning, we have you covered. Contact us today to get started.',
                    'quantity' => '3',
                    'title_1' => 'Step 1: Initial Consultation',
                    'description_1' => 'Schedule a consultation with our experts to discuss your business needs and goals.',
                    'icon_1' => 'ti ti-chart-pie',
                    'button_label_1' => 'Read More',
                    'button_url_1' => '/contact-us',
                    'title_2' => 'Step 2: Initial Consultation',
                    'description_2' => 'Schedule a consultation with our experts to discuss your business needs and goals.',
                    'icon_2' => 'ti ti-bulb',
                    'button_label_2' => 'Read more',
                    'button_url_2' => '/contact-us',
                    'title_3' => 'Step 3: Initial Consultation',
                    'description_3' => 'Schedule a consultation with our experts to discuss your business needs and goals.',
                    'icon_3' => 'ti ti-rocket',
                    'button_label_3' => 'Read More',
                    'button_url_3' => '/contact-us',
                    'background_color' => 'rgb(20, 23, 108)',
                ]) .
                Shortcode::generateShortcode('services', [
                    'style' => 'style-1',
                    'title' => 'Transforming Businesses with <span> Financial Excellence',
                    'subtitle' => 'FEATURES PROJECTS',
                    'service_ids' => '1,2,3,4',
                    'button_label' => 'See All Services',
                    'button_url' => '/',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('site-statistics', [
                    'style' => 'style-2',
                    'title' => 'Our Journey Towards <span> Financial Excellence',
                    'subtitle' => 'FEATURES PROJECTS',
                    'description' => 'With a track record of success, we have served numerous clients worldwide, providing top-notch financial and accounting services.',
                    'button_label' => 'See All Services',
                    'button_url' => '/services',
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
                    'background_image' => $this->filePath('backgrounds/contact-block-bg-3.png'),
                    'background_color' => 'rgb(20, 23, 108)',
                ]) .
                Shortcode::generateShortcode('testimonials', [
                    'style' => 'style-6',
                    'title' => 'What are They Saying About Our Company',
                    'subtitle' => 'FEATURES PROJECTS',
                    'testimonial_ids' => '1,2,3,4',
                    'background_color' => 'transparent',
                    'enable_lazy_loading' => 'yes',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-16',
                    'title' => "Business Growth Creativity <br> Meet Our Agency's Experts",
                    'subtitle' => 'ABOUT COMPANY',
                    'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master.We successfully cope varying complexity provide area longerty guarantees.',
                    'image' => $this->filePath('general/about-us-information-16.png'),
                    'image_1' => $this->filePath('general/about-us-information-5-1.png'),
                    'quantity' => '4',
                    'title_1' => 'Medicare Advantage Plans',
                    'title_2' => 'Analysis & Research',
                    'title_3' => '100% Secure Money Back',
                    'title_4' => '100% Money Growth',
                    'data_count' => '15+',
                    'data_count_description' => 'World Best Agency Award Got',
                    'background_color' => 'rgb(254, 246, 230)',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-8',
                    'title' => 'We Offer Business Insight World Class Consulting',
                    'subtitle' => 'WHY WE ARE THE BEST',
                    'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master new Practice Following gies heur portfolio includes dozen.',
                    'image' => $this->filePath('general/about-us-information-8-1.jpg'),
                    'image_1' => $this->filePath('general/about-us-information-8-2.jpg'),
                    'quantity' => '2',
                    'title_1' => 'Business Solutions',
                    'description_1' => 'Semper egetuis kelly for tellus urna area condition.',
                    'icon_1' => 'ti ti-chart-pie-2',
                    'title_2' => 'Market Analysis',
                    'description_2' => 'Semper egetuis kelly for tellus urna area condition.',
                    'icon_2' => 'ti ti-broadcast',
                    'background_color' => 'rgb(23, 26, 124)',
                ], lazy: true) .
                Shortcode::generateShortcode('blog-posts', [
                    'style' => 'style-1',
                    'category_ids' => '2,3,4,5',
                    'title' => 'Featured News And Insights',
                    'subtitle' => 'OUR BLOG UPDATE',
                    'limit' => '3',
                    'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                    'background_color' => 'transparent',
                ], lazy: true)
            ),
        ]);
    }
}
