<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Gallery\Database\Traits\HasGallerySeeder;

class GallerySeeder extends BaseSeeder
{
    use HasGallerySeeder;

    public function run(): void
    {
        $this->uploadFiles('galleries');

        $galleries = [
            'Perfect',
            'New Day',
            'Happy Day',
            'Nature',
            'Morning',
            'Sunset',
            'Ocean Views',
            'Adventure Time',
        ];

        $this->createGalleries(
            collect($galleries)->map(function (string $item, int $index) {
                return ['name' => $item, 'image' => $this->filePath('galleries/' . ($index + 1) . '.jpg')];
            })->toArray(),
            array_map(function ($index) {
                return ['img' => $this->filePath('galleries/' . $index . '.jpg'), 'description' => ''];
            }, range(1, 8))
        );
    }
}
