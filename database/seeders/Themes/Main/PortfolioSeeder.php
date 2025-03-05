<?php

namespace Database\Seeders\Themes\Main;

use Botble\ACL\Models\User;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Portfolio\Enums\PackageDuration;
use Botble\Portfolio\Models\CustomField;
use Botble\Portfolio\Models\CustomFieldOption;
use Botble\Portfolio\Models\Package;
use Botble\Portfolio\Models\Project;
use Botble\Portfolio\Models\Service;
use Botble\Portfolio\Models\ServiceCategory;
use Botble\Shortcode\Facades\Shortcode;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class PortfolioSeeder extends BaseSeeder
{
    public function run(): void
    {
        ServiceCategory::query()->truncate();
        Service::query()->truncate();
        Package::query()->truncate();
        Project::query()->truncate();
        CustomField::query()->truncate();
        CustomFieldOption::query()->truncate();

        $this->uploadFiles('projects');

        $fake = $this->fake();

        $packages = [
            [
                'name' => 'Basic Plan',
                'description' => 'Advanced features for pros who need more customization.',
                'price' => 19,
                'annual_price' => 119,
                'duration' => PackageDuration::MONTHLY,
                'features' => <<<HTML
                + 100 User Activities
                + Limit Access
                + No Hidden Charge
                + 01 Time Updates
                + Figma Source File
                + Many More Facilities
                HTML,
                'action_label' => 'Get The Plan Now',
                'action_url' => '/contact-us',
            ],
            [
                'name' => 'Team Plan',
                'description' => 'All the basics for businesses that are just getting started.',
                'price' => 49,
                'annual_price' => 499,
                'duration' => PackageDuration::MONTHLY,
                'features' => <<<HTML
                + 1000 User Activities
                + Unlimited Access
                + No Hidden Charge
                + 03 Time Updates
                + Figma Source File
                + Many More Facilities
                HTML,
                'is_popular' => true,
                'action_label' => 'Get The Plan Now',
                'action_url' => '/contact-us',
            ],
            [
                'name' => 'Enterprise Plan',
                'description' => 'Advanced features for pros who need more customization.',
                'price' => 99,
                'annual_price' => 999,
                'duration' => PackageDuration::MONTHLY,
                'features' => <<<HTML
                + 5000 User Activities
                + Unlimited Access
                + No Hidden Charge
                + 10 Time Updates
                + Figma Source File
                + Many More Facilities
                HTML,
                'action_label' => 'Get The Plan Now',
                'action_url' => '/contact-us',
            ],
        ];

        foreach ($packages as $item) {
            $package = Package::query()->create(array_merge(Arr::except($item, ['metadata']), [
                'price' => '$' . number_format($item['price']),
                'annual_price' => '$' . number_format($item['annual_price']),
                'content' => File::get(
                    database_path('seeders/contents/package.html')
                ),
            ]));

            if (isset($item['metadata'])) {
                foreach ($item['metadata'] as $key => $value) {
                    MetaBox::saveMetaBoxData($package, $key, $value);
                }
            }

            SlugHelper::createSlug($package);
        }

        $projectCategories = ['Business Strategy', 'Business Services', 'Inventory Tracking', 'Financing Management'];

        $projects = [
            [
                'name' => 'Innovation Hub: Navigating the Future',
                'description' => 'Gain invaluable insights into strategic business planning and decision-making through our comprehensive program. Unlock the power of data-driven strategies for sustainable growth.',
                'author' => $this->fake()->name,
                'place' => 'Paris',
                'client' => 'Grace Williams',
                'image' => $this->filePath('projects/1.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Leadership Excellence Initiative',
                'description' => 'Join us at the Innovation Hub, where we explore cutting-edge technologies and trends shaping the future of business. Discover innovative solutions and stay ahead of the curve.',
                'author' => $this->fake()->name,
                'place' => 'USA',
                'client' => 'Michael Turner',
                'image' => $this->filePath('projects/2.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Startup Accelerator Program',
                'description' => 'Accelerate your startup’s growth with our intensive program. From idea to market entry, we provide mentorship, resources, and networking opportunities for success.',
                'author' => $this->fake()->name,
                'place' => 'Thailand',
                'client' => 'David Chen',
                'image' => $this->filePath('projects/3.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Marketing Mastery Series',
                'description' => 'Master the art of marketing with our comprehensive series. From branding to digital marketing, this series equips you with the skills to captivate your audience.',
                'author' => $this->fake()->name,
                'place' => 'Japan',
                'client' => 'Takashi Hamachi',
                'image' => $this->filePath('projects/4.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Illustration Design',
                'description' => $this->fake()->text(),
                'author' => $this->fake()->name,
                'place' => 'USA',
                'client' => 'David Kane',
                'image' => $this->filePath('projects/5.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Design & Development',
                'description' => $this->fake()->text(),
                'author' => $this->fake()->name,
                'place' => 'Canada',
                'client' => 'Franks Doe',
                'image' => $this->filePath('projects/6.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Marketing Consultancy',
                'description' => $this->fake()->text(),
                'author' => $this->fake()->name,
                'place' => 'India',
                'client' => 'Alexander Kavas',
                'image' => $this->filePath('projects/7.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Digital Marketing',
                'description' => $this->fake()->text(),
                'author' => $this->fake()->name,
                'place' => 'Brazil',
                'client' => 'Roby Elexa',
                'image' => $this->filePath('projects/8.jpg'),
                'start_date' => $this->fake()->date,
            ],
            [
                'name' => 'Strategic Planning',
                'description' => $this->fake()->text(),
                'author' => $this->fake()->name,
                'place' => 'Thai Lan',
                'client' => 'Nicola Per',
                'image' => $this->filePath('projects/9.jpg'),
                'start_date' => $this->fake()->date,
            ],
        ];

        $shortcodeContentFeatured = Shortcode::generateShortcode('content-featured', [
            'title' => 'Our Corporate Business Planning',
            'description' => 'When an unknown printer took a galley of type and scrambled it to make a type specimen bookhas survived not only five centuries.but also the leap into electronic typesetting, remaining.',
            'image' => $this->filePath('general/content-featured.jpg'),
            'quantity' => 4,
            'title_1' => 'Medicare Advantage Plans',
            'title_2' => 'Analysis & Research',
            'title_3' => '100% Secure Money Back',
            'title_4' => '100% Money Growth',
        ]);

        foreach ($projects as $item) {
            $project = Project::query()->create($item);

            $content = str_replace(
                [
                    '[project-name]',
                    '[content-featured]',
                ],
                [
                    $project->name,
                    $shortcodeContentFeatured,
                ],
                File::get(
                    database_path('seeders/contents/project.html')
                )
            );

            $project->update(['content' => $content]);

            SlugHelper::createSlug($project);

            MetaBox::saveMetaBoxData($project, 'category', Arr::random($projectCategories));
        }

        $serviceCategories = [
            [
                'name' => 'Financial Analysis',
                'metadata' => [
                    'icon' => 'ti ti-briefcase',
                ],
            ],
            [
                'name' => 'Tax Strategy',
                'metadata' => [
                    'icon' => 'ti ti-square-percentage',
                ],
            ],
            [
                'name' => 'Market Research',
                'metadata' => [
                    'icon' => 'ti ti-layers-subtract',
                ],
            ],
            [
                'name' => 'Business Strategy',
                'metadata' => [
                    'icon' => 'ti ti-timeline',
                ],
            ],
        ];

        foreach ($serviceCategories as $index => $item) {
            $index++;

            $serviceCategory = ServiceCategory::query()->create(array_merge(Arr::except($item, ['metadata']), [
                'description' => $fake->text(400),
                'order' => $index,
            ]));

            if (isset($item['metadata'])) {
                foreach ($item['metadata'] as $key => $value) {
                    MetaBox::saveMetaBoxData($serviceCategory, $key, $value);
                }
            }

            SlugHelper::createSlug($serviceCategory);
        }

        $categoryIds = $serviceCategory::query()->pluck('id')->all();

        $serviceContent = str_replace([
            '[content-feature-list]',
            '[content-featured]',
        ], [
            Shortcode::generateShortcode('content-feature-list', [
                'quantity' => 2,
                'title_1' => 'Extend Coverage',
                'icon_1' => 'ti ti-plant-2',
                'description_1' => 'We successfully copey withtks arying mplexity aweprguara nd regularly master',
                'title_2' => 'Modern Insurance',
                'icon_2' => 'ti ti-assembly',
                'description_2' => 'Master the art of negotiation and achieve mutually beneficial outcomes.',
            ]),
            Shortcode::generateShortcode('content-featured', [
                'title' => 'Raise Capital Faster & Negotiate On Your Own Terms',
                'description' => 'Accelerate your business growth and secure funding with confidence through our comprehensive services tailored to meet your needs.',
                'image' => $this->filePath('general/content-featured.jpg'),
                'quantity' => 3,
                'title_1' => 'Business Growth',
                'title_2' => 'Analysis & Research',
                'title_3' => '100% Secure',
            ]),
        ], file_get_contents(database_path('seeders/contents/service.html')));

        $services = [
            [
                'name' => 'Data Analyst',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/1.jpg'),
                'images' => [$this->filePath('news/1.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-briefcase',
                ],
            ],
            [
                'name' => 'Liability Planner',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/3.jpg'),
                'images' => [$this->filePath('news/3.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-calendar-week',
                ],
            ],
            [
                'name' => 'Growth Planner',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/4.jpg'),
                'images' => [$this->filePath('news/2.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-coin',
                ],
            ],
            [
                'name' => 'Risk Manager',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/2.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-layers-subtract',
                ],
            ],
            [
                'name' => 'Retirement Planner',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/4.jpg'),
                'images' => [$this->filePath('news/3.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-brand-databricks',
                ],
            ],
            [
                'name' => 'Risk Analyst',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/2.jpg'),
                'images' => [$this->filePath('news/2.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-report-analytics',
                ],
            ],
            [
                'name' => 'Insurance Expert',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/4.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-moneybag',
                ],
            ],
            [
                'name' => 'Budget Manager',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/2.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-layers-subtract',
                ],
            ],
            [
                'name' => 'Strategy Adviser',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/1.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-moneybag',
                ],
            ],
            [
                'name' => 'Operations Expert',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/2.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-heart-handshake',
                ],
            ],
            [
                'name' => 'Profit Strategist',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/1.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-code-circle',
                ],
            ],

            [
                'name' => 'Objective Planner',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/2.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-presentation',
                ],
            ],
            [
                'name' => 'Goal Specialist',
                'category_id' => Arr::random($categoryIds),
                'image' => $this->filePath('news/3.jpg'),
                'images' => [$this->filePath('news/4.jpg')],
                'metadata' => [
                    'icon' => 'ti ti-brand-funimation',
                ],
            ],
        ];

        foreach ($services as $item) {
            $item['content'] = $serviceContent;
            $service = Service::query()->create(array_merge(Arr::except($item, ['metadata']), [
                'is_featured' => $fake->boolean(),
                'description' => $fake->text(),
                'views' => rand(0, 10000),
            ]));

            if (isset($item['metadata'])) {
                foreach ($item['metadata'] as $key => $value) {
                    MetaBox::saveMetaBoxData($service, $key, $value);
                }
            }

            SlugHelper::createSlug($service);
        }

        $customFields = [
            [
                'name' => 'Type',
                'type' => 'dropdown',
                'options' => [
                    [
                        'label' => 'Health Insurance',
                        'value' => 'Health Insurance',
                    ],
                    [
                        'label' => 'Travel Insurance',
                        'value' => 'Travel Insurance',
                    ],
                    [
                        'label' => 'Vehicle Insurance',
                        'value' => 'Vehicle Insurance',
                    ],
                    [
                        'label' => 'Cargo Insurance',
                        'value' => 'Cargo Insurance',
                    ],
                    [
                        'label' => 'Fire Insurance',
                        'value' => 'Fire Insurance',
                    ],
                ],
            ],
            [
                'name' => 'Price',
                'type' => 'number',
            ],
        ];

        foreach ($customFields as $item) {
            $customField = CustomField::query()->create(array_merge(Arr::except($item, 'options'), [
                'author_id' => 1,
                'author_type' => User::class,
                'required' => fake()->boolean(),
            ]));

            $customField->options()->createMany($item['options'] ?? []);
        }
    }
}
