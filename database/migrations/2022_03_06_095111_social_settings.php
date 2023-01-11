<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class SocialSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.facebook', 'https://facebook.com/level7up');
        $this->migrator->add('social.twitter', 'https://twitter.com/level7up');
        $this->migrator->add('social.linkedin', 'https://linkedin.com/level7up');
        $this->migrator->add('social.instagram', 'https://instagram.com/level7up');
        $this->migrator->add('social.snapchat', 'https://snapchat.com/level7up');
        $this->migrator->add('social.tiktok', 'https://tiktok.com/level7up');
    }
}