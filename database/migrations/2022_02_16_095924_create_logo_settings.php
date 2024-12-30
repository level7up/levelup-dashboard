<?php

use App\UI\Palettes\Images;
use Level7up\Dashboard\Palette\Migrations\Migration;


class CreateLogoSettings extends Migration
{
    protected $ignoreDuplications = true;
    protected $palette = Images::class;

    public function groups(): void
    {
        $this->group('logo', function ($group) {
            return $group->image('default', '/assets/dashboard/media/logos/180x50.svg')
                ->image('default_dark', '/assets/dashboard/media/logos/180x50-dark.svg')
                ->image('favicon', '/assets/dashboard/media/logos/60x60.svg')
                ->image('favicon_dark', '/assets/dashboard/media/logos/60x60-dark.svg')
                ->image('square', '/assets/dashboard/media/logos/256x256.svg')
                ->image('square_dark', '/assets/dashboard/media/logos/256x256-dark.svg');
        });
    }
}
