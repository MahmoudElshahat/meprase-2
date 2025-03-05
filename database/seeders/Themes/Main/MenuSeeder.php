<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Menu\Database\Traits\HasMenuSeeder;
use Botble\Page\Database\Traits\HasPageSeeder;
use Botble\Page\Models\Page;

class MenuSeeder extends BaseSeeder
{
    use HasMenuSeeder;
    use HasPageSeeder;

    public function run(): void
    {
        $this->createMenus($this->getData());
    }

    protected function getData(): array
    {
        $items = [
            [
                'title' => 'Home',
                'url' => '/',
                'children' => [
                    [
                        'title' => 'Business',
                        'url' => 'https://apexa.archielite.com',
                    ],
                    [
                        'title' => 'Finance',
                        'url' => 'https://apexa-finance.archielite.com',
                    ],
                    [
                        'title' => 'Consulting',
                        'url' => 'https://apexa-consulting.archielite.com',
                    ],
                    [
                        'title' => 'Insurance',
                        'url' => 'https://apexa-insurance.archielite.com',
                    ],
                    [
                        'title' => 'Digital Agency',
                        'url' => 'https://apexa-digital-agency.archielite.com',
                    ],
                    [
                        'title' => 'Finance Solutions',
                        'url' => 'https://apexa-finance-solutions.archielite.com',
                    ],
                    [
                        'title' => 'Accounting Services',
                        'url' => 'https://apexa-accounting-services.archielite.com',
                    ],
                    [
                        'title' => 'IT Solutions',
                        'url' => 'https://apexa-it-solutions.archielite.com',
                    ],
                ],
            ],
            [
                'title' => 'About Us',
                'url' => '/',
                'children' => [
                    [
                        'title' => 'Business About',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Business About'),
                    ],
                    [
                        'title' => 'Finance About',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Finance About'),
                    ],
                    [
                        'title' => 'Consulting About',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Consulting About'),
                    ],
                    [
                        'title' => 'Insurance About',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Insurance About'),
                    ],
                    [
                        'title' => 'Digital agency About',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Digital Agency About'),
                    ],
                ],
            ],
            [
                'title' => 'Services',
                'url' => '/',
                'children' => [
                    [
                        'title' => 'Business Service',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Services'),
                    ],
                    [
                        'title' => 'Finance Service',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Finance Service'),
                    ],
                    [
                        'title' => 'Consulting Service',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Consulting Service'),
                    ],
                    [
                        'title' => 'Insurance Service',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Insurance Service'),
                    ],
                    [
                        'title' => 'Digital Agency Service',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Digital Agency Service'),
                    ],
                    [
                        'title' => 'Service Details One',
                        'url' => '/services/data-analyst',
                    ],
                ],
            ],
            [
                'title' => 'Pages',
                'url' => '/',
                'children' => [
                    [
                        'title' => 'Careers',
                        'url' => '/careers',
                    ],
                    [
                        'title' => 'Career Details',
                        'url' => '/careers/lead-backend-developer',
                    ],
                    [
                        'title' => 'Team One',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Team One'),
                    ],
                    [
                        'title' => 'Team Two',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Team Two'),
                    ],
                    [
                        'title' => 'Team Three',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Team Three'),
                    ],
                    [
                        'title' => 'Team Four',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Team Four'),
                    ],
                    [
                        'title' => 'Team Details',
                        'url' => '/teams/devon-lane',
                    ],
                    [
                        'title' => 'Project Details',
                        'url' => '/projects/strategic-planning',
                    ],
                    [
                        'title' => 'Product List',
                        'url' => '/products',
                    ],
                    [
                        'title' => 'Product Details',
                        'url' => '/products/kelloggs-coco-pops-cereal-digital',
                    ],
                    [
                        'title' => '404 Error Page',
                        'url' => '/404',
                    ],
                    [
                        'title' => 'Login Page',
                        'url' => '/login',
                    ],
                    [
                        'title' => 'Register Page',
                        'url' => '/resister',
                    ],
                    [
                        'title' => 'Forgot password Page',
                        'url' => '/password/reset',
                    ],
                ],
            ],
            [
                'title' => 'Blogs',
                'url' => '/',
                'children' => [
                    [
                        'title' => 'Our Blog',
                        'reference_type' => Page::class,
                        'reference_id' => $this->getPageId('Blog'),
                    ],
                    [
                        'title' => 'Blog Details',
                        'url' => '/the-art-of-negotiation-winning-deals-and-building-relationships',
                    ],
                ],
            ],
            [
                'title' => 'Contact Us',
                'reference_type' => Page::class,
                'reference_id' => $this->getPageId('Contact Us'),
            ],
        ];

        return [
            [
                'name' => 'Main menu',
                'slug' => 'main-menu',
                'location' => 'main-menu',
                'items' => $items,
            ],
        ];
    }
}
