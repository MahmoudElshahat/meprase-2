<?php

namespace Database\Seeders\Themes\ItSolutions;

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
                    'style' => 'style-3',
                    'key' => 'home-slider',
                ]) .
                Shortcode::generateShortcode('service-categories', [
                    'style' => 'style-3',
                    'service_category_ids' => '1,2,3,4',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-15',
                    'title' => 'Cloud Services for Seamless Data Management',
                    'subtitle' => 'TOP OF TECHNOLOGY',
                    'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master. We successfully cope varying complexity provide area longerty guarantees.',
                    'image' => $this->filePath('general/about-us-information-15.png'),
                    'image_1' => $this->filePath('general/about-us-information-5-1.png'),
                    'quantity' => '4',
                    'title_1' => 'Medicare Advantage Plans',
                    'title_2' => 'Analysis & Research',
                    'title_3' => '100% Secure Money Back',
                    'title_4' => '100% Money Growth',
                    'data_count' => '25',
                    'data_count_description' => 'We successfully cope with tasks of varying complexity provide area',
                    'button_label' => 'Contact with Us',
                    'button_url' => '/contact-us',
                    'background_color' => 'transparent',
                    'enable_lazy_loading' => 'yes',
                ], lazy: true) .
                Shortcode::generateShortcode('team', [
                    'style' => 'style-3',
                    'title' => 'Financial Expertise You Can Trust',
                    'subtitle' => 'MEET OUR TEAM',
                    'description' => 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.',
                    'team_ids' => '1,2,3,4',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-9',
                    'title' => 'Preparing for your success provide best IT solutions.',
                    'subtitle' => 'WHY CHOOSE OUR SERVICE',
                    'description' => 'We have the technology and industry expertise to develop solutions that can connect people and businesses across variety of mobile devices.',
                    'image' => $this->filePath('general/about-us-information-9.png'),
                    'image_1' => $this->filePath('general/about-us-information-9-1.png'),
                    'image_2' => $this->filePath('general/hero-banner-5-1.png'),
                    'quantity' => '3',
                    'title_1' => 'Medicare Advantage Plans',
                    'title_2' => 'Analysis & Research',
                    'title_3' => '100% Secure Money Back',
                    'author_name' => 'Martinaze',
                    'author_title' => 'CEO',
                    'author_avatar' => $this->filePath('general/author-avatar.png'),
                    'author_signature' => $this->filePath('general/author-signature.png'),
                    'contact_title' => '+123 8989 444',
                    'contact_subtitle' => 'Hot Line Number',
                    'contact_url' => 'tel:123 8989 444',
                    'contact_icon' => 'ti ti-phone-call',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('services', [
                    'style' => 'style-7',
                    'title' => 'Digital Marketing expertise <br> You can trust',
                    'subtitle' => 'MEET OUR TEAM',
                    'description' => 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.',
                    'service_ids' => '1,2,3,4,5,6',
                    'button_label' => 'Contact for new projects',
                    'button_url' => '/contact-us',
                    'background_color' => 'rgb(236, 246, 250)',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-4',
                    'title' => 'Streamline Your IT Operations with Us',
                    'subtitle' => 'TRANSFORM',
                    'description' => 'Our IT services ensure your business operates smoothly, with enhanced productivity and robust cybersecurity measures.',
                    'image' => $this->filePath('general/about-us-information-4-3.png'),
                    'quantity' => '2',
                    'title_1' => 'Improved Efficiency',
                    'description_1' => 'Our solutions optimize your workflows, saving time and resources.',
                    'title_2' => 'Enhanced Security',
                    'description_2' => 'Protect your sensitive data and prevent cyber threats with our advanced measures.',
                    'data_count' => '25',
                    'data_count_description' => 'Years Experiences <br> in this field',
                    'button_label' => 'Read more',
                    'button_url' => '/contact-us',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('about-us-information', [
                    'style' => 'style-6',
                    'title' => 'Transforming Businesses with Cutting-Edge IT Solutions',
                    'subtitle' => 'INNOVATE',
                    'description' => 'Our company is a leader in the IT industry, providing innovative solutions that drive business growth and success. With our expertise and cutting-edge technology, we help businesses transform their operations and stay ahead of the competition.',
                    'image' => $this->filePath('general/about-us-information-6-4.png'),
                    'quantity' => '2',
                    'title_1' => '120%',
                    'description_1' => 'Our company offers a seamless process for businesses to engage with our IT services',
                    'title_2' => '150%',
                    'description_2' => 'We provide customized IT solutions that perfectly align with your business requirements and goals.',
                    'button_label' => 'Read more',
                    'button_url' => '/',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('pricing', [
                    'title' => 'We’ve Offered The Best Pricing For You',
                    'subtitle' => 'FLEXIBLE PRICING PLAN',
                    'package_ids' => '1,2,3',
                    'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                ], lazy: true) .
                Shortcode::generateShortcode('testimonials', [
                    'style' => 'style-3',
                    'title' => 'Happy Clients',
                    'description' => 'Hear what our satisfied clients have to say',
                    'testimonial_ids' => '1,2,3,4',
                    'background_color' => 'transparent',
                ], lazy: true) .
                Shortcode::generateShortcode('blog-posts', [
                    'style' => 'style-1',
                    'category_ids' => '1,2,3,4',
                    'title' => 'Featured News And Insights',
                    'subtitle' => 'OUR BLOG UPDATE',
                    'limit' => '3',
                    'background_color' => 'transparent',
                ], lazy: true)
            ),
        ]);
    }
}
