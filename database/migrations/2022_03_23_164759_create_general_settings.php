<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('home_page.hero', [
            'en' => [
                'title'=>'Tabani',
                'subtitle'=>'Best Site To Adopt Pets In Egypt',
                'cta_name'=>'Book now',
                'image'=>'assets/images/home/hero-img_en.svg',
            ],
            'ar' => [
                'title'=>'تبني',
                'subtitle'=>'أفضل موقع لتبني الحيوانات الأليفة في مصر',
                'cta_name'=>'احجز الان',
                'image'=>'assets/images/home/hero-img_ar.svg',
            ]
        ]);
        $this->migrator->add('home_page.contactUs',[
            'en'=>[
                'whatsapp'=> '01002874060', 
                'facebook'=>'https://www.facebook.com/',
                'facebook_title' =>'Hash Studio',
                'twitter' => 'https://www.twitter.com/',
                'twitter_title' => 'Hash Twitter',
                'email' => 'info@hashstudio.com',
                'email_title' => 'Hash Email',
                'location' => 'some_location',
                'location_title' => 'Our Location'
            ],
            'ar'=>[
                'whatsapp'=> '01002874060', 
                'facebook'=>'https://www.facebook.com/',
                'facebook_title' =>'فيسبوك',
                'twitter' => 'https://www.twitter.com/',
                'twitter_title' => 'تويتر',
                'email' => 'info@hashstudio.com',
                'email_title' => 'الايميل',
                'location' => 'some_location',
                'location_title' => 'عناويننا'
            ]
        ]);
        $this->migrator->add('home_page.about',[
            'en'=> [
                'title' => 'Tabani',
                'subtitle'=>'Tabani for adopting pets',
                'description'=>'Tabani for adopting pets',
                'image'=> 'someImage',
                'description2' => 'description_2',
                 'icon'=> 'Icons'
            ],
            'ar'=> [
                'title' => 'تبني ',
                'subtitle'=>'هاش استوديو للخدمات البرمجية المتكاملة',
                'description'=>'هاش استوديو للخدمات البرمجية المتكاملة',
                'image'=> 'someImage',
                'description2' => 'وصف تاني ',
                'icon'=> 'Icons'

            ]
        ]);

        $this->migrator->add('home_page.services', [
            'en' => [
                'title'=>'Our Services',
                'subtitle'=>'Our Services Subtitle',
                'icon'=>'Some Icon',
            ],
            'ar' => [
                'title'=>'خدماتنا',
                'subtitle'=>'العنوان الفرعي لخدماتنا',
                'icon '=>'ايقونة',
            ]
        ]);


    }
}
