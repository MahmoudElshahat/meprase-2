<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Facades\Html;
use Botble\Base\Supports\BaseSeeder;
use Botble\Page\Database\Traits\HasPageSeeder;
use Botble\Shortcode\Facades\Shortcode;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class PageSeeder extends BaseSeeder
{
    use HasPageSeeder;

    /**
     * @throws FileNotFoundException
     */
    public function run(): void
    {
        $this->truncatePages();

        $this->uploadFiles('brands');

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
        ]);
        $shortcodeSiteStatistics = Shortcode::generateShortcode('site-statistics', [
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
            'background_color' => 'rgb(255, 251, 243)',
        ], lazy: true);
        $shortcodeContactBlock = Shortcode::generateShortcode('contact-block', [
            'style' => 'style-1',
            'title' => 'Offering The Best Experience Of Business Consulting Services',
            'subtitle' => 'Toll Free Call',
            'phone_number' => '+ 88 ( 9600 ) 6002',
            'button_label' => 'Request a Free Call',
            'button_url' => 'tel:8896006002',
            'background_image' => $this->filePath('backgrounds/contact-block-bg.jpg'),
            'background_color' => 'transparent',
            'enable_lazy_loading' => 'yes',
        ]);
        $shortcodeTeam = Shortcode::generateShortcode('team', [
            'style' => 'style-1',
            'title' => 'Financial Expertise You Can Trust',
            'subtitle' => 'MEET OUR TEAM',
            'description' => 'Our power of choice is untrammelled and when nothing prevents being able to do what we like best every pleasure.',
            'team_ids' => '1,2,3,4',
            'background_color' => 'transparent',
        ], lazy: true);
        $shortcodePricing = Shortcode::generateShortcode('pricing', [
            'title' => 'We’ve Offered The Best Pricing For You',
            'subtitle' => 'FLEXIBLE PRICING PLAN',
            'package_ids' => '1,2,3',
            'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
        ], lazy: true);

        $shortcodeAboutUsInformationStyle8 = Shortcode::generateShortcode('about-us-information', [
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
        ], lazy: true);

        $pages = [
            [
                'name' => 'Homepage',
                'content' =>
                    htmlentities(
                        Shortcode::generateShortcode('hero-banner', [
                            'title' => 'Business Consulting All Solutions',
                            'subtitle' => 'WE ARE EXPERT IN THIS FIELD',
                            'description' => 'Apexa Helps You To Convert Your Data Into A Strategic Asset And Get Business Insights Apexa Helps You To Convert Your Data Into Asset And Get Top-Notch Business Insights.',
                            'button_label' => 'Read more',
                            'button_url' => '/',
                            'display_social_links' => '0,1',
                            'display_button_scroll_down' => '0,1',
                            'background_image' => $this->filePath('backgrounds/hero-banner.jpg'),
                            'background_color' => 'transparent',
                            'enable_lazy_loading' => 'no',
                        ]) .
                        $shortcodeBrand .
                        Shortcode::generateShortcode('about-us-information', [
                            'style' => 'style-1',
                            'title' => 'We Help Organizations To Make Ultimate Businesses Growth Success.',
                            'subtitle' => 'SIMPLY KNOW ABOUT',
                            'description' => 'We successfully cope with tasks of varying complexity, provide long-term guarantees and regularly master new Practice Area technologies. Our portfolio includes dozens.',
                            'image' => $this->filePath('general/about-us-information-1.jpg'),
                            'quantity' => '2',
                            'title_1' => 'Business Solutions',
                            'description_1' => 'Semper egetuis tellus urna condi',
                            'icon_1' => 'ti ti-target',
                            'title_2' => 'Quality Services',
                            'description_2' => 'Semper egetuis tellus urna condi',
                            'icon_2' => 'ti ti-chart-bar',
                            'data_count' => '25 -',
                            'data_count_description' => 'Years Of - Experience',
                            'author_name' => 'Martinaze',
                            'author_title' => 'CEO',
                            'author_avatar' => $this->filePath('general/author-avatar.png'),
                            'author_signature' => $this->filePath('general/author-signature.png'),
                            'button_label' => 'Read more',
                            'button_url' => '/',
                            'background_color' => 'transparent',
                        ], lazy: true) .
                        Shortcode::generateShortcode('services', [
                            'style' => 'style-1',
                            'title' => 'We Offer An Effective Wide Area Business solutions',
                            'subtitle' => 'WHAT WE OFFER',
                            'description' => 'Empowering Businesses through Strategic Consulting With Us',
                            'service_ids' => '1,2,3,4',
                            'button_label' => 'See All Services',
                            'button_url' => '/',
                            'background_image' => $this->filePath('backgrounds/services-bg.jpg'),
                            'background_color' => 'transparent',
                        ], lazy: true) .
                        $shortcodeAboutUsInformationStyle8 .
                        $shortcodeSiteStatistics .
                        Shortcode::generateShortcode('projects', [
                            'style' => 'style-1',
                            'title' => 'Let’s Discover All Our Clients Recent Project',
                            'subtitle' => 'OUR PROJECTS',
                            'description' => 'We successfully cope with tasks of varying complexity, <br> provide long-term guarantees and regularly',
                            'project_ids' => '1,2,3,4',
                            'button_label' => 'See All Projects',
                            'button_url' => '/',
                            'background_color' => 'transparent',
                        ], lazy: true) .
                        $shortcodeContactBlock .
                        $shortcodeTeam .
                        Shortcode::generateShortcode('consulting-block', [
                            'title' => 'Trusted , Happy & Satisfied Businesses',
                            'description' => 'When you work with HR Solutions, you get the best. We provide adaptable solutions that allow you to be a part of the entire process',
                            'image' => $this->filePath('general/consulting-block.jpg'),
                            'data_count' => '40+',
                            'data_count_description' => 'Consulting <br> farm',
                            'background_color' => 'rgb(25, 29, 136)',
                        ]) .
                        Shortcode::generateShortcode('testimonials', [
                            'style' => 'style-1',
                            'image' => $this->filePath('general/testimonials-1.png'),
                            'testimonial_ids' => '1,2,3,4',
                            'background_color' => 'rgb(255, 251, 243)',
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
                'template' => 'homepage',
            ],
            [
                'name' => 'Contact Us',
                'content' =>
                    '<br><br><br><br>' .
                    Html::tag('div', '[google-map height="500"]Awamileaug Drive, Kensington London, UK[/google-map]') .
                    Shortcode::generateShortcode('contact-form', [
                        'display_fields' => 'phone,email,subject,address',
                        'mandatory_fields' => 'email',
                        'title' => 'How can we help you?',
                        'description' => 'When an unknown printer took a galley of type and scrambled it to make type pecimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker', // Replaced placeholder description
                        'quantity' => 3,
                        'title_1' => 'Address',
                        'icon_1' => 'ti ti-map-pin',
                        'description_1' => 'Awamileaug Drive, Kensington London, UK',
                        'title_2' => 'Phone',
                        'icon_2' => 'ti ti-phone-call',
                        'description_2' => '+48 500-130-0001',
                        'title_3' => 'E-mail',
                        'icon_3' => 'ti ti-mail',
                        'description_3' => 'info@gmail.com',
                        'form_title' => 'Give Us a Message',
                        'form_description' => 'Your email address will not be published. Required fields are marked *',
                        'form_button_label' => 'Submit Post',
                    ]),
            ],
            [
                'name' => 'Blog',
                'content' => '',
            ],
            [
                'name' => 'Business About',
                'content' => htmlentities(
                    Shortcode::generateShortcode('about-us-information', [
                        'style' => 'style-11',
                        'title' => 'We Help Organizations To Make Ultimate Businesses Growth Success',
                        'subtitle' => 'SIMPLY KNOW ABOUT',
                        'description' => 'We successfully cope with tasks of varying complexityprovide longerty term guarantees and regularly master new Practice Area technol ogiesOur portfolio includes dozen',
                        'image' => $this->filePath('general/about-us-information-11.jpg'),
                        'image_1' => $this->filePath('general/about-us-information-11-1.jpg'),
                        'image_2' => $this->filePath('general/about-us-information-11-2.png'),
                        'quantity' => '3',
                        'title_1' => 'Medicare Advantage Plans',
                        'title_2' => 'Analysis & Research',
                        'title_3' => '100% Secure Money Back',
                        'data_count' => '15+',
                        'data_count_description' => 'World Best Agency <br> Award Got',
                        'button_label' => 'Contact With Us',
                        'button_url' => '/contact-us',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    $shortcodeBrand .
                    Shortcode::generateShortcode('about-us-information', [
                        'style' => 'style-12',
                        'title' => 'Digital Solutions For Your Online Business',
                        'subtitle' => 'WHY WE ARE THE BEST',
                        'description' => 'We successfully cope with tasks of varying complexity provide area longerty guarantees and regularly master new Practice Following gies heur.',
                        'quantity' => '4',
                        'title_1' => 'Business Solutions',
                        'description_1' => 'Semper egetuis kelly for tellus urna area condition.',
                        'icon_1' => 'ti ti-chart-histogram',
                        'title_2' => 'Finance Planning',
                        'description_2' => 'Semper egetuis kelly for tellus urna area condition.',
                        'icon_2' => 'ti ti-building-bank',
                        'title_3' => 'Market Analysis',
                        'description_3' => 'Semper egetuis kelly for tellus urna area condition.',
                        'icon_3' => 'ti ti-ad-2',
                        'title_4' => 'Business Solutions',
                        'description_4' => 'Semper egetuis kelly for tellus urna area condition.',
                        'icon_4' => 'ti ti-box-model',
                        'background_color' => 'rgb(23, 26, 124)',
                        'enable_lazy_loading' => 'yes',
                    ]) .
                    $shortcodeSiteStatistics .
                    Shortcode::generateShortcode('team', [
                        'style' => 'style-4',
                        'title' => 'Business Expertise Is Here For You Can Trust',
                        'subtitle' => 'MEET OUR TEAM',
                        'team_ids' => '1,2,3,4',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'yes',
                    ])
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Finance About',
                'content' => htmlentities(
                    Shortcode::generateShortcode('about-us-information', [
                        'style' => 'style-13',
                        'title' => 'Dedicated Teams <br> <span>Always</span> Bring Something <span>Good</span>',
                        'description' => 'We when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only fiveawe centuriesbut also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release offer Letraset when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only ',
                        'image' => $this->filePath('general/about-us-information-13.jpg'),
                        'quantity' => '6',
                        'data_count' => '25',
                        'data_count_description' => 'Years of experience',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    $shortcodeSiteStatistics .
                    $shortcodeContactBlock .
                    $shortcodeTeam .
                    Shortcode::generateShortcode('testimonials', [
                        'style' => 'style-4',
                        'image' => $this->filePath('general/testimonials-4.png'),
                        'testimonial_ids' => '1,2,3,4',
                        'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                        'enable_lazy_loading' => 'yes',
                    ]),
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Consulting About',
                'content' => htmlentities(
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
                        'enable_lazy_loading' => 'yes',
                    ]) .
                    $shortcodeSiteStatistics .
                    $shortcodeContactBlock .
                    $shortcodeTeam .
                    Shortcode::generateShortcode('testimonials', [
                        'style' => 'style-4',
                        'image' => $this->filePath('general/testimonials-4.png'),
                        'testimonial_ids' => '1,2,3,4',
                        'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                        'enable_lazy_loading' => 'yes',
                    ]) .
                    $shortcodeBrand,
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Insurance About',
                'content' => htmlentities(
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
                        'enable_lazy_loading' => 'no',
                    ]) .
                    $shortcodeAboutUsInformationStyle8 .
                    Shortcode::generateShortcode('testimonials', [
                        'style' => 'style-1',
                        'image' => $this->filePath('general/testimonials-4-1.png'),
                        'testimonial_ids' => '1,2,3,4',
                        'background_image' => $this->filePath('backgrounds/about-us-information-bg.jpg'),
                        'enable_lazy_loading' => 'yes',
                    ]) .
                    $shortcodePricing .
                    $shortcodeBrand,
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Digital Agency About',
                'content' => '<br><br><br><br>' . htmlentities(
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
                        'enable_lazy_loading' => 'no',
                    ]) .
                    Shortcode::generateShortcode('services', [
                        'style' => 'style-3',
                        'title' => 'Transforming Your Business With Technology',
                        'subtitle' => 'SPECIAL FEATURES',
                        'service_ids' => '1,2,7',
                        'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                        'enable_lazy_loading' => 'yes',
                    ]) .
                    Shortcode::generateShortcode('testimonials', [
                        'style' => 'style-2',
                        'title' => 'What Our Loving Clients Saying',
                        'subtitle' => 'CLIENTS TESTIMONIAL',
                        'testimonial_ids' => '1,2,3',
                        'background_color' => 'rgb(20, 23, 108)',
                        'enable_lazy_loading' => 'yes',
                    ]) .
                    $shortcodePricing,
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Services',
                'content' => htmlentities(
                    Shortcode::generateShortcode('services', [
                        'style' => 'style-1',
                        'title' => 'We Offer An Effective Wide Area Business solutions',
                        'subtitle' => 'WHAT WE OFFER',
                        'service_ids' => '1,2,3,4,5,6,7,8',
                        'background_image' => 'backgrounds/blog-posts-bg.jpg',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]),
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Finance Service',
                'content' => htmlentities(
                    Shortcode::generateShortcode('services', [
                        'style' => 'style-2',
                        'title' => 'Let’s Discover Our Service <br> Features Charter',
                        'subtitle' => 'WHY WE ARE THE BEST',
                        'service_ids' => '1,2,3,4,5,6,7,8',
                        'background_color' => '#14176C',
                        'enable_lazy_loading' => 'no',
                    ]),
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Consulting Service',
                'content' => htmlentities(
                    Shortcode::generateShortcode('services', [
                        'style' => 'style-3',
                        'title' => 'We Offer An Effective Wide Area Business solutions',
                        'subtitle' => 'WHAT WE OFFER',
                        'service_ids' => '1,2,3,4,5,6,7,8',
                        'background_image' => 'backgrounds/blog-posts-bg.jpg',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]),
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Digital Agency Service',
                'content' => htmlentities(
                    Shortcode::generateShortcode('services', [
                        'style' => 'style-6',
                        'title' => 'We Do World Class Work For You',
                        'subtitle' => 'WHAT WE OFFER',
                        'service_ids' => '1,2,3,4,5,6,7,8',
                        'background_image' => $this->filePath('backgrounds/blog-posts-bg.jpg'),
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]),
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Insurance Service',
                'content' => htmlentities(
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
                        'enable_lazy_loading' => 'no',
                    ])
                ),
                'template' => 'full-width',
            ],
            [
                'name' => 'Team One',
                'content' =>
                    Shortcode::generateShortcode('team', [
                        'style' => 'style-1',
                        'team_ids' => '1,2,3,4,5,6,7,8',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    $shortcodeBrand,
                'template' => 'full-width',
            ],
            [
                'name' => 'Team Two',
                'content' =>
                    Shortcode::generateShortcode('team', [
                        'style' => 'style-2',
                        'team_ids' => '1,2,3,4,5,6,7,8',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    str_replace('background_color="transparent"', 'background_color="#F7F7F8"', $shortcodeBrand),
                'template' => 'full-width',
            ],
            [
                'name' => 'Team Three',
                'content' =>
                    Shortcode::generateShortcode('team', [
                        'style' => 'style-3',
                        'team_ids' => '1,2,3,4,5,6,7,8',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    str_replace('background_color="transparent"', 'background_color="#F7F7F8"', $shortcodeBrand),
                'template' => 'full-width',
            ],
            [
                'name' => 'Team Four',
                'content' =>
                    Shortcode::generateShortcode('team', [
                        'style' => 'style-4',
                        'team_ids' => '1,2,3,4,5,6,7,8',
                        'background_color' => 'transparent',
                        'enable_lazy_loading' => 'no',
                    ]) .
                    str_replace('background_color="transparent"', 'background_color="#F7F7F8"', $shortcodeBrand),
                'template' => 'full-width',
            ],
            [
                'name' => 'How Its Work',
                'content' => Shortcode::generateShortcode('instruction-steps', [
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
                ]) . '<br><br>',
                'template' => 'full-width',
            ],
            [
                'name' => 'Pricing',
                'content' => $shortcodePricing,
                'template' => 'full-width',
            ],
            [
                'name' => 'Testimonials',
                'content' => Shortcode::generateShortcode('testimonials', [
                    'style' => 'style-2',
                    'title' => 'What Our Loving Clients Saying',
                    'subtitle' => 'CLIENTS TESTIMONIAL',
                    'testimonial_ids' => '1,2,3',
                    'background_color' => 'rgb(20, 23, 108)',
                    'enable_lazy_loading' => 'yes',
                ]) . '<br><br>',
                'template' => 'full-width',
            ],
        ];

        $this->createPages($pages);
    }
}
