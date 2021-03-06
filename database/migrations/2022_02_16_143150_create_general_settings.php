<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name','Tabani');
        $this->migrator->add('general.email','Tabani@gmail.com');
        $this->migrator->add('general.phone','+201000000010');
        $this->migrator->add('general.mainColor','#35a180');
        $this->migrator->add('general.site_description',[
            'en'=>'Enjoy a smoother and easier experience on your phone, download the app now',
            'ar' =>'وصف الموقع بس بالعربي'
        ]);
        $this->migrator->add('general.address',[
            'en'=>'Egypt Tala',
            'ar' =>'العنوان بس بالعربي'
        ]);
        $this->migrator->add('general.slogan',[
            'en'=>'That’s it! Now it’s time to select the perfect slogan for your latest endeavor t',
            'ar' =>'السلوجن بس  بالعربي'
        ]);
        $this->migrator->add('general.copyrights',[
            'en'=>'Tabani copyrights',
            'ar' =>'تبني'
        ]);
    }
}
