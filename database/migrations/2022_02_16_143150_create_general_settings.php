<?php

use App\UI\Palettes\General;
use Level7up\Dashboard\Palette\Migrations\Migration;


class CreateGeneralSettings extends Migration
{
    protected $palette = General::class;

    protected $ignoreDuplications = true;

    public function groups(): void
    {
        $this->group('general', function ($group) {
            return $group->text('site_name', 'Hash studio')
                ->text('email', 'info@hashstudio.dev')
                ->text('phone', '+201012895020')
                ->text('site_description', [
                    'en'=>'Enjoy a smoother and easier experience on your phone, download the app now',
                    'ar' =>'وصف الموقع بس بالعربي',
                ])
                ->repeater('address')
                ->text('slogan', [
                    'en'=>'That’s it! Now it’s time to select the perfect slogan for your latest endeavor t',
                    'ar' =>'شعار الموقع',
                ])
                ->text('copyrights', [
                    'en'=>'©️ 2022 copyrights',
                    'ar' =>'جميع الحقوق محفوظة ©️ 2022',
                ]);
        });
    }
}
