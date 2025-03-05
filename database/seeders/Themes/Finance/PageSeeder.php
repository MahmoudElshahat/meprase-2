<?php

namespace Database\Seeders\Themes\Finance;

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
                Shortcode::generateShortcode('simple-slider', [
                    'style' => 'style-1',
                    'key' => 'home-slider',
                ]) .
                Shortcode::generateShortcode('service-categories', [
                    'style' => 'style-1',
                    'service_category_ids' => '1, 2, 3, 4',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-2',
                    'title' => 'We Provide Brilliant Ideas & Adding Success To Your Business Motion.',
                    'subtitle' => 'ABOUT OUR COMPANY',
                    'description' => 'Mauris ut enim sit amet lacus ornare ullamcorper. Praesent placerat neque eu purus rhoncus, vel tincidunt odio ultrices. Sed theya are feugiat elis Curabitur posuere tristique.',
                    'image' => $this->filePath('general/about-us-information-2-1.jpg'),
                    'image_1' => $this->filePath('general/about-us-information-2-2.jpg'),
                    'quantity' => '4',
                    'title_1' => 'Challenge Business Growth',
                    'title_2' => 'Analysis & Research',
                    'title_3' => 'Finance Security Solutions',
                    'title_4' => '100% Money Growth',
                    'data_count' => '25',
                    'data_count_description' => 'Years Of Experiences',
                    'author_name' => 'Martinaze',
                    'author_title' => 'CEO',
                    'author_avatar' => 'general/author-avatar.png',
                    'author_signature' => 'general/author-signature.png',
                    'button_label' => 'Read more',
                    'button_url' => '/',
                    'background_color' => 'transparent',
                    'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                ], lazy: true) .
                Shortcode::generateShortcode('services', [
                    'style' => 'style-2',
                    'title' => 'Let’s Discover Our Service Features Charter',
                    'subtitle' => 'WHY WE ARE THE BEST',
                    'service_ids' => '1,2,4,7',
                    'background_color' => 'rgb(20, 23, 108)',
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
                    'title' => 'Offering The Best Experience Of Finance Services',
                    'subtitle' => 'Toll Free Call',
                    'phone_number' => '+ 88 ( 9600 ) 6002',
                    'button_label' => 'Request A Free Call',
                    'button_url' => 'tel:8896006002',
                    'background_image' => $this->filePath('backgrounds/contact-block-bg-1.jpg'),
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('projects', [
                    'style' => 'style-3',
                    'title' => 'We Provide Solutions To Big & Small Organizations',
                    'subtitle' => 'OUR PROJECTS',
                    'project_ids' => '1,2,3,4,5',
                    'background_color' => 'rgb(255, 251, 243)',
                ], lazy: true) .
                Shortcode::generateShortcode('team', [
                    'style' => 'style-2',
                    'title' => 'Meet Our Specialized Team Of Experts',
                    'subtitle' => 'MEET OUR TEAM',
                    'team_ids' => '1,2,3,4',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('testimonials', [
                    'style' => 'style-2',
                    'title' => 'What Our Loving Clients Saying',
                    'subtitle' => 'CLIENTS TESTIMONIAL',
                    'testimonial_ids' => '1,2,3',
                    'background_color' => 'rgb(20, 23, 108)',
                ], lazy: true) .
                Shortcode::generateShortcode('brands', [
                    'name_1' => 'Door Dash',
                    'image_1' => $this->filePath('brands/1.png'),
                    'url_1' => '/',
                    'name_2' => 'Discord',
                    'image_2' => $this->filePath('brands/1.png'),
                    'url_2' => '/',
                    'name_3' => 'Airbnb',
                    'image_3' => $this->filePath('brands/1.png'),
                    'url_3' => '/',
                    'name_4' => 'Norton',
                    'image_4' => $this->filePath('brands/1.png'),
                    'url_4' => '/',
                    'name_5' => 'Naturewave',
                    'image_5' => $this->filePath('brands/1.png'),
                    'url_5' => '/',
                    'quantity' => '5',
                ], lazy: true) .
                Shortcode::generateShortcode('blog-posts', [
                    'style' => 'style-2',
                    'category_ids' => '1,2,3,4,5',
                    'title' => 'Featured News And Insights',
                    'subtitle' => 'OUR BLOG UPDATE',
                    'limit' => '3',
                    'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                    'background_color' => 'transparent',
                ], lazy: true),
        ]);
    }
}
