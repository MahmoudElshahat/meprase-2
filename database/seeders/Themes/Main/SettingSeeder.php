<?php

namespace Database\Seeders\Themes\Main;

use Botble\Base\Supports\BaseSeeder;
use Botble\Setting\Facades\Setting;

class SettingSeeder extends BaseSeeder
{
    public function run(): void
    {
        $settings = [
            'admin_logo' => $this->filePath('icons/logo-white.png'),
            'admin_favicon' => $this->filePath('icons/favicon.png'),
        ];

        Setting::set($settings);
        Setting::save();
    }
}
