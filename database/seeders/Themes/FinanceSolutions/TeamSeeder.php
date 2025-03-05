<?php

namespace Database\Seeders\Themes\FinanceSolutions;

class TeamSeeder extends \Database\Seeders\Themes\Main\TeamSeeder
{
    public function getFilePath(int $index): string
    {
        return $this->filePath('teams/5-' . $index + 1 . '.png');
    }
}
