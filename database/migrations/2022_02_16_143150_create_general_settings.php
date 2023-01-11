<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name','Level7up');
        $this->migrator->add('general.email','Level7up@gmail.com');
        $this->migrator->add('general.phone','+201000000010');
        $this->migrator->add('general.mainColor','#35a180');
        $this->migrator->add('general.site_description',[
            'en'=>'Enjoy a smoother and easier experience on your phone, download the app now',
            'ar' =>'وصف الموقع  بالعربي'
        ]);
        $this->migrator->add('general.address',[
            'en'=>'Berket Elsab3',
            'ar' =>'بركة السبع'
        ]);
        $this->migrator->add('general.slogan',[
            'en'=>'That’s it! Now it’s time to select the perfect slogan for your latest endeavor t',
            'ar' =>'السلوجن بالعربي'
        ]);
        $this->migrator->add('general.copyrights',[
            'en'=>'Tabani copyrights',
            'ar' =>'تبني'
        ]);
    }
}