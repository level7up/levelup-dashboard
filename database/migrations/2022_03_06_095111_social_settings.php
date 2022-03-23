<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class SocialSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social.facebook', 'https://facebook.com/hash');
        $this->migrator->add('social.twitter', 'https://twitter.com/hash');
        $this->migrator->add('social.linkedin', 'https://linkedin.com/hash');
        $this->migrator->add('social.instagram', 'https://instagram.com/hash');
        $this->migrator->add('social.snapchat', 'https://snapchat.com/hash');
        $this->migrator->add('social.tiktok', 'https://tiktok.com/hash');
    }
}
