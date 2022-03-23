<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateLogoSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('logo.default', '/assets/dashboard/media/logos/180x50.png');
        $this->migrator->add('logo.default_dark', '/assets/dashboard/media/logos/180x50-dark.png');
        $this->migrator->add('logo.favicon', '/assets/dashboard/media/logos/60x60.png');
        $this->migrator->add('logo.favicon_dark', '/assets/dashboard/media/logos/60x60-dark.png');
        $this->migrator->add('logo.square', '/assets/dashboard/media/logos/256x256.png');
        $this->migrator->add('logo.square_dark', '/assets/dashboard/media/logos/256x256-dark.png');
    }
}
