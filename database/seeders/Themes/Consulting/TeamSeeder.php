<?php

namespace Database\Seeders\Themes\Consulting;

class TeamSeeder extends \Database\Seeders\Themes\Main\TeamSeeder
{
    public function getFilePath(int $index): string
    {
        return $this->filePath('teams/2-' . $index + 1 . '.jpg');
    }
}
