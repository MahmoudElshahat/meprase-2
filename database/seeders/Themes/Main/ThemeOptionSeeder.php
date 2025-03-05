<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Database\Traits\HasPageSeeder;
use Botble\Theme\Database\Traits\HasThemeOptionSeeder;
use Botble\Theme\Supports\ThemeSupport;

class ThemeOptionSeeder extends BaseSeeder
{
    use HasThemeOptionSeeder;
    use HasPageSeeder;

    public function run(): void
    {
        $this->createThemeOptions($this->getThemeOptions());
    }

    protected function getThemeOptions(): array
    {
        return [
            'site_title' => 'Apexa - Business Consulting Laravel Script',
            'seo_description' => 'Elevate your business consulting with Apexa - Business Consulting Laravel Script. Streamline operations, enhance client relationships, and boost productivity effortlessly. Get started now!',
            'copyright' => '©%Y Archi Elite Team. All Rights Reserved.',
            'favicon' => $this->filePath('icons/favicon.png'),
            'logo' => $this->filePath('icons/logo.png'),
            'logo_height' => 40,
            'primary_font' => 'Inter',
            'secondary_font' => 'Outfit',
            'primary_color' => '#F7A400',
            'secondary_color' => '#191D88',
            'heading_color' => '#14176C',
            'text_color' => '#3E4073',
            'preloader_enabled' => 1,
            'preloader_version' => 'v2',
            'lazy_load_images' => 1,
            'lazy_load_placeholder_image' => $this->filePath('icons/preloader-image.gif'),
            'header_action_label' => 'Let’s Talk',
            'header_action_url' => '/contact-us',
            'social_links' => ThemeSupport::getDefaultSocialLinksData(),
            'social_sharing' => ThemeSupport::getDefaultSocialSharingData(),
            'footer_background_color' => '#FFFFFF',
            'footer_bottom_background_color' => '#ECF6FA',
            'footer_heading_color' => '#14176C',
            'footer_text_color' => '#3E4073',
            'footer_border_color' => '#CFDDE2',
            'footer_background_image' => $this->filePath('backgrounds/footer-bg.png'),
            'header_style' => 1,
            'is_header_transparent' => true,
            'header_top_text_color' => '#E6EEFF',
            'header_top_background_color' => '#0E104B',
            'header_action_buttons' => [
                [
                    [
                        'key' => 'label',
                        'value' => 'Let’s Talk',
                    ],
                    [
                        'key' => 'url',
                        'value' => '/contact-us',
                    ],
                ],
            ],
            'homepage_id' => $this->getPageId('Homepage'),
            'blog_page_id' => $this->getPageId('Blog'),
            'breadcrumb_background_image' => $this->filePath('backgrounds/breadcrumb-bg.jpg'),
            'quotation_form_title' => 'Get A Quote',
            'quotation_form_button_label' => 'Request A Quote',
        ];
    }
}
