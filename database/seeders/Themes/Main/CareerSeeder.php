<?php

namespace Database\Seeders\Themes\Main;

use ArchiElite\Career\Models\Career;
use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class CareerSeeder extends BaseSeeder
{
    public function run(): void
    {
        Career::query()->truncate();

        $this->uploadFiles('careers');

        $careers = [
            [
                'name' => 'Senior Full Stack Engineer',
                'description' => 'Join our team as a Senior Full Stack Engineer and help us build cutting-edge solutions to empower creators worldwide.',
                'icon' => 'ti ti-chart-bar',
            ],
            [
                'name' => 'Lead Backend Developer',
                'description' => 'Exciting opportunity for a Lead Backend Developer to lead our backend team in architecting scalable and robust systems.',
                'icon' => 'ti ti-replace',
            ],
            [
                'name' => 'UI/UX Designer',
                'description' => 'We are looking for a talented UI/UX Designer to create intuitive and visually stunning user experiences for our products.',
                'icon' => 'ti ti-components',
            ],
            [
                'name' => 'Product Manager',
                'description' => 'As a Product Manager, you will drive the development and strategy of our products to meet the needs of our growing user base.',
                'icon' => 'ti ti-brand-deezer',
            ],
            [
                'name' => 'Data Scientist',
                'description' => 'Seeking a Data Scientist to analyze large datasets and derive actionable insights to inform business decisions.',
                'icon' => 'ti ti-video',
            ],
            [
                'name' => 'DevOps Engineer',
                'description' => 'We are hiring a DevOps Engineer to streamline our development processes and ensure the reliability and scalability of our infrastructure.',
                'icon' => 'ti ti-device-desktop-code',
            ],
        ];

        foreach ($careers as $item) {
            $career = Career::query()->create(array_merge(Arr::except($item, ['icon']), [
                'location' => "{$this->fake()->city()}, {$this->fake()->country()}",
                'salary' => number_format($this->fake()->numberBetween(500, 10000)),
                'content' => File::get(database_path('/seeders/contents/career.html')),
            ]));

            MetaBox::saveMetaBoxData($career, 'image', 'careers/banner.jpg');
            MetaBox::saveMetaBoxData($career, 'icon', $item['icon']);
            MetaBox::saveMetaBoxData($career, 'apply_url', '/contact-us');

            SlugHelper::createSlug($career);
        }
    }
}
