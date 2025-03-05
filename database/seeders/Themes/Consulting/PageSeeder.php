<?php

namespace Database\Seeders\Themes\Consulting;

use Botble\Page\Models\Page;
use Botble\Shortcode\Facades\Shortcode;

class PageSeeder extends \Database\Seeders\Themes\Main\PageSeeder
{
    public function run(): void
    {
        parent::run();

        $homepage = Page::query()->where('name', 'Homepage')->firstOrFail();

        $pageContent =
            Shortcode::generateShortcode('hero-banner', [
                'title' => 'Dynamic Solutions That <span> Power High </span> Growth Startups',
                'description' => 'Apexa helps you to convert your data into a strategic asset and get business insights Apexa helps you to convert.',
                'button_label' => 'Get Started',
                'button_url' => '/',
                'display_social_links' => '0,1',
                'display_button_scroll_down' => '0',
                'background_image' => $this->filePath('backgrounds/hero-banner-1.jpg'),
                'background_color' => 'transparent',
            ]) .
            Shortcode::generateShortcode('about-us-information', [
                'style' => 'style-3',
                'title' => 'Providing Expert Advice On Business Consulting, Planning & Success',
                'subtitle' => 'ABOUT OUR COMPANY',
                'description' => 'Mauris ut enim sit amet lacus ornare ullamcorper. Praesent plaacerat neque eu purus rhoncus, vel tincidunt odio ultrices. Seed theya are feugiat elis Curabitur posuere tristique.',
                'image' => $this->filePath('general/about-us-information-3-1.jpg'),
                'image_1' => $this->filePath('general/about-us-information-3-2.jpg'),
                'quantity' => '3',
                'title_1' => 'Business Growth',
                'title_2' => 'Analysis & Research',
                'title_3' => '100% Secure',
                'data_count' => '25',
                'data_count_description' => 'YEARS <br> EXPERIENCE <br> IN CONSULTING',
                'author_name' => 'Martinaze',
                'author_title' => 'CEO',
                'author_avatar' => $this->filePath('general/author-avatar.png'),
                'author_signature' => $this->filePath('general/author-signature.png'),
                'contact_title' => '+123 8989 444',
                'contact_subtitle' => 'Hot Line Number',
                'contact_url' => 'tel:+123 8989444',
                'contact_icon' => 'ti ti-phone-call',
                'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('services', [
                'style' => 'style-3',
                'title' => 'Let’s Discover Our Service Features Charter',
                'subtitle' => 'WHAT WE OFFER',
                'service_ids' => '1,2,3,4,5,6',
                'background_image' => $this->filePath('backgrounds/services-bg-3.jpg'),
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('about-us-information', [
                'style' => 'style-10',
                'title' => 'We Offer Business Insight World Class Consulting',
                'subtitle' => 'WHY WE ARE THE BEST',
                'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master new Practice Following gies heur portfolio includes.',
                'image' => $this->filePath('general/about-us-information-10.jpg'),
                'image_1' => $this->filePath('general/about-us-information-8-2.jpg'),
                'quantity' => 2,
                'title_1' => 'Finance Planning',
                'description_1' => 'Apexa helps youcona doing <br> tempor incididunt.',
                'icon_1' => 'ti ti-api-app',
                'title_2' => 'Market Analysis',
                'description_2' => 'Apexa helps youcona doing <br> tempor incididunt.',
                'icon_2' => 'ti ti-table-shortcut',
                'background_color' => 'rgb(255, 255, 255)',
            ], lazy: true) .
            Shortcode::generateShortcode('projects', [
                'style' => 'style-4',
                'title' => 'We Provide Solutions To Big & Small Organizations For Work',
                'subtitle' => 'OUR PROJECTS',
                'project_ids' => '1,2,3,4,5',
                'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('site-statistics', [
                'style' => 'style-1',
                'quantity' => '4',
                'title_1' => 'Successfully Completed Projects',
                'data_1' => '45',
                'unit_1' => '+',
                'image_1' => $this->filePath('icons/trophy.png'),
                'title_2' => 'Years of Experiences To Run This Company',
                'data_2' => '25',
                'unit_2' => '+',
                'image_2' => $this->filePath('icons/time.png'),
                'title_3' => 'Satisfied 100% Our Clients',
                'data_3' => '92',
                'unit_3' => 'K+',
                'image_3' => $this->filePath('icons/star.png'),
                'title_4' => 'All Over The World We Are Available',
                'data_4' => '19',
                'unit_4' => '+',
                'image_4' => $this->filePath('icons/popularity.png'),
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('contact-block', [
                'style' => 'style-2',
                'title' => 'Offering The Best Experience Of Business Consulting Services',
                'subtitle' => 'Toll Free Call',
                'phone_number' => '+ 88 ( 9600 ) 6002',
                'button_label' => 'Request a Free Call',
                'button_url' => 'tel:8896006002',
                'background_image' => $this->filePath('backgrounds/contact-block-bg.jpg'),
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('team', [
                'style' => 'style-3',
                'title' => 'Financial Expertise You Can Trust',
                'subtitle' => 'MEET OUR TEAM',
                'description' => 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.',
                'team_ids' => '1,2,3,4',
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('testimonials', [
                'style' => 'style-4',
                'image' => $this->filePath('general/testimonials-4.png'),
                'testimonial_ids' => '1,2,3,4',
                'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                'background_color' => 'transparent',
            ], lazy: true) .
            Shortcode::generateShortcode('newsletter', [
                'title' => 'Request A Call Back',
                'description' => 'Ever find yourself staring at your computer screen slogan to come to mind? Oftentimes.',
                'button_label' => 'Send Now',
                'background_color' => 'rgb(20, 23, 108)',
            ], lazy: true) .
            Shortcode::generateShortcode('blog-posts', [
                'style' => 'style-2',
                'category_ids' => '2,3,4,5',
                'title' => 'Featured News And Insights',
                'subtitle' => 'OUR BLOG UPDATE',
                'limit' => '3',
                'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                'background_color' => 'transparent',
            ], lazy: true);

        $homepage->update([
            'content' => htmlentities($pageContent),
        ]);
    }
}
