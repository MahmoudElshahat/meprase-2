<?php

namespace Database\Seeders\Themes\Main;

use ArchiElite\Announcement\Models\Announcement;
use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Facades\Setting;
use Carbon\Carbon;

class AnnouncementSeeder extends BaseSeeder
{
    public function run(): void
    {
        Announcement::query()->truncate();

        $announcements = [
            'Introducing Our New Business Consulting Solutions!',
            'Elevate Your Business with Our Comprehensive Consulting Services.',
            'Revolutionize Your Business Strategy with Our Expertise.',
        ];

        $now = Carbon::now();

        foreach ($announcements as $key => $value) {
            Announcement::query()->create([
                'name' => sprintf('Announcement %s', $key + 1),
                'content' => $value,
                'start_date' => $now,
                'dismissible' => true,
            ]);
        }

        $settings = [
            'announcement_max_width' => '1210',
            'announcement_text_color' => '#FFFFFF',
            'announcement_background_color' => '#F7A400',
            'announcement_text_alignment' => 'start',
            'announcement_dismissible' => '1',
            'announcement_font_size' => 1,
        ];

        Setting::delete(array_keys($settings));

        Setting::set($settings)->save();
    }
}
