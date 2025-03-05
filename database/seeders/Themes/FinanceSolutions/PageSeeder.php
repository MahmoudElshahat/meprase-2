<?php

namespace Database\Seeders\Themes\FinanceSolutions;

use Botble\Page\Models\Page;
use Botble\Shortcode\Facades\Shortcode;

class PageSeeder extends \Database\Seeders\Themes\Main\PageSeeder
{
    public function run(): void
    {
        parent::run();

        $homepage = Page::query()->where('name', 'Homepage')->firstOrFail();

        $homepage->update([
            'content' =>
                htmlentities(
                    Shortcode::generateShortcode('simple-slider', [
                        'style' => 'style-2',
                        'key' => 'home-slider',
                    ]) .
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
                    Shortcode::generateShortcode('services', [
                        'style' => 'style-5',
                        'title' => 'The Best Of Product <br> Your Business',
                        'subtitle' => 'WHAT WE OFFER',
                        'service_ids' => '1,2,3,4,5,6',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'yes',
                    ], lazy: true) .
                    Shortcode::generateShortcode('testimonials', [
                        'style' => 'style-2',
                        'title' => 'What Our Loving Clients Saying',
                        'subtitle' => 'CLIENTS TESTIMONIAL',
                        'testimonial_ids' => '1,2,3,4',
                        'background_color' => 'rgb(20, 23, 108)',
                    ], lazy: true) .
                    Shortcode::generateShortcode('about-us-information', [
                        'style' => 'style-6',
                        'title' => 'We provide comprehensive financial solutions and platform for your business',
                        'subtitle' => 'ABOUT OUR COMPANY',
                        'description' => 'Mauris ut enim sit amet lacus ornare ullamcorper. Praesent plaacerat neque eu purus rhoncus, vel tincidunt odio ultrices. Seed theya are feugiat elis Curabitur posuere tristique.',
                        'image' => $this->filePath('general/about-us-information-6-1.png'),
                        'image_1' => $this->filePath('general/about-us-information-6-3.png'),
                        'image_2' => $this->filePath('general/about-us-information-6-2.png'),
                        'quantity' => '2',
                        'title_1' => 'Team Support',
                        'description_1' => 'Apexa helps youcona doing tempor incididunt.',
                        'icon_1' => 'ti ti-24-hours',
                        'title_2' => 'Financial Experts',
                        'description_2' => 'Apexa helps youcona doing tempor incididunt.',
                        'icon_2' => 'ti ti-report-money',
                        'background_color' => 'transparent',
                    ], lazy: true) .
                    Shortcode::generateShortcode('contact-block', [
                        'style' => 'style-3',
                        'title' => 'We offer specialized financial guidance tailored to both businesses and individuals.',
                        'subtitle' => 'Empowering Businesses through Strategic Consulting With Us',
                        'button_label' => 'See All Services',
                        'button_url' => '/services',
                        'background_image' => $this->filePath('backgrounds/contact-block-bg-3.png'),
                        'background_color' => 'rgb(20, 23, 108)',
                    ]) .
                    Shortcode::generateShortcode('team', [
                        'style' => 'style-5',
                        'title' => 'Meet Our Amazing Team',
                        'subtitle' => 'Financial Experts',
                        'team_ids' => '1,2,3,4',
                        'button_label' => 'Contact Us',
                        'button_url' => '/contact-us',
                        'background_color' => 'transparent',
                    ], lazy: true) .
                    Shortcode::generateShortcode('faqs', [
                        'title' => 'Frequently asked questions',
                        'description' => 'Our power of choice is untrammelled and when nothing preventsbeing able to do what we like best every pleasure.',
                        'image' => $this->filePath('general/faq.png'),
                        'faq_category_ids' => '1,2,3',
                        'limit' => '3',
                        'floating_block_icon' => 'ti ti-24-hours',
                        'floating_block_title' => 'Need more help?',
                        'floating_block_description' => 'Feeling inquisitive? Have a read through some of our FAQs or contact our Supporters for help',
                    ], lazy: true) .
                    Shortcode::generateShortcode('about-us-information', [
                        'style' => 'style-14',
                        'title' => 'Want to talk to a marketing expert?',
                        'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master.',
                        'image' => $this->filePath('general/about-us-information-14.png'),
                        'quantity' => '3',
                        'title_1' => 'Medicare Advantage Plans',
                        'title_2' => 'Analysis & Research',
                        'title_3' => '100% Secure Money Back',
                        'button_label' => 'Read more',
                        'button_url' => '/contact-us',
                        'background_color' => 'rgb(236, 246, 250)',
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
