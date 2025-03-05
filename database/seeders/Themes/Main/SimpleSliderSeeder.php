<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Facades\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Setting\Facades\Setting;
use Botble\SimpleSlider\Models\SimpleSlider;
use Botble\SimpleSlider\Models\SimpleSliderItem;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SimpleSliderSeeder extends BaseSeeder
{
    public function run(): void
    {
        SimpleSlider::query()->truncate();
        SimpleSliderItem::query()->truncate();

        $this->uploadFiles('sliders');

        foreach ($this->getSliders() as $parent) {
            /** @var SimpleSlider $slider */
            $slider = SimpleSlider::query()->create(array_merge(Arr::except($parent, 'children'), [
                'key' => Str::slug($parent['name']),
            ]));

            LanguageMeta::saveMetaData($slider);

            foreach ($parent['children'] as $key => $item) {
                $sliderItem = $slider->sliderItems()->create([
                    ...Arr::except($item, ['metadata']),
                    'order' => $key,
                ]);

                foreach ($item['metadata'] as $metaKey => $metaValue) {
                    MetaBox::saveMetaBoxData($sliderItem, $metaKey, $metaValue);
                }
            }
        }

        Setting::set('simple_slider_using_assets', false)->save();
    }

    protected function getSliders(): array
    {
        return [
            [
                'name' => 'Home slider',
                'description' => 'The main slider on homepage',
                'children' => [
                    [
                        'title' => 'Transforming Dreams into Financial Reality',
                        'description' => 'Apexa helps you to convert your data into a strategic asset and get business insights Apexa helps you to convert.',
                        'link' => '/',
                        'image' => $this->filePath('sliders/1.jpg'),
                        'metadata' => [
                            'subtitle' => 'We Are Expert In This Field',
                            'button_label' => 'Free Consulting',
                            'data_count' => 15,
                            'data_count_description' => 'Years of applying <br> digital transformation',
                        ],
                    ],
                    [
                        'title' => 'Unlock the Power of Data-Driven Decisions',
                        'description' => 'Gain valuable insights from your data to optimize marketing campaigns, improve customer experiences, and boost your bottom line.',
                        'link' => '/',
                        'image' => $this->filePath('sliders/2.jpg'),
                        'metadata' => [
                            'subtitle' => 'Actionable Analytics & Reporting',
                            'button_label' => 'Learn More',
                            'data_count' => 25,
                            'data_count_description' => 'Years Experiences <br> in this field',
                        ],
                    ],
                ],
            ],
        ];
    }
}
