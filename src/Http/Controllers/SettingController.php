<?php

namespace Level7up\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Level7up\Dashboard\Settings\LogoSettings;
use Level7up\Dashboard\Settings\MobileSettings;
use Level7up\Dashboard\Settings\SocialSettings;
use Level7up\Dashboard\Settings\GeneralSettings;
use Level7up\Dashboard\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(LogoSettings $logo)
    {
        return view('dashboard::pages.settings.logos', compact('logo'));
    }

    public function updateLogos(Request $request, LogoSettings $logo)
    {
        foreach ($request->file('logo', []) as $key =>$image) {
            $imageName = $key.'.'.$image->extension();

            Storage::disk('public')->putFileAs(
                'logos',
                $image,
                $imageName
            );

            $logo->$key = "/storage/logos/${imageName}";
            $logo->save();
        }

        return $this->successRedirect('dashboard.settings.updateLogos', trans("dashboard::messages.setting.updateLogos"));
    }

    public function setDefaultLogo($key, LogoSettings $logo)
    {
        $logo->$key = $logo->default($key);
        $logo->save();
        return redirect()->back();
    }

    public function general(GeneralSettings $general, $locale)
    {
        return view('dashboard::pages.settings.general', [
                    'general' =>$general,
                    'locale' => $locale
                ]);
    }

    public function updateGeneral(Request $request, GeneralSettings $general)
    {
        $request->validate([
            'site_name' => 'required',
            'site_description' => 'required',
            'slogan' => 'required',
            'mainColor' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'copyrights' => 'required',
            'locale' => 'required|in:en,ar'
        ]);
        setting_update('general', 'site_name',$request->site_name);
        // $general->site_name = $request->site_name;
        // $general->email = $request->email;
        // $general->phone = $request->phone;
        // $general->mainColor = $request->mainColor;

        // $general->site_description = array_merge($general->site_description, [
        //     $request->locale =>  $request->site_description,
        // ]);
        // $general->slogan = array_merge($general->slogan, [
        //     $request->locale =>  $request->slogan,
        // ]);
        // $general->address = array_merge($general->address, [
        //     $request->locale =>  $request->address,
        // ]);
        // $general->copyrights = array_merge($general->copyrights, [
        //     $request->locale =>  $request->copyrights,
        // ]);

        // $general->save();
        return $this->successRedirect('dashboard.settings.updateGeneral', trans("dashboard::messages.setting.updateGeneral"), ['locale'=>$request->locale]);
    }

    public function social(SocialSettings $social)
    {
        return view('dashboard::pages.settings.social', compact('social'));
    }

    public function updateSocial(Request $request, SocialSettings $social)
    {
        $social->facebook = $request->facebook ?? "";
        $social->twitter = $request->twitter ?? "";
        $social->linkedin = $request->linkedin ?? "";
        $social->instagram = $request->instagram ?? "";
        $social->snapchat = $request->snapchat ?? "";
        $social->tiktok = $request->tiktok ?? "";
        $social->save();

        return $this->successRedirect('dashboard.settings.updateSocial', trans("dashboard::messages.setting.updateSocial"));
    }

    public function mobile(MobileSettings $mobile)
    {
        return view('dashboard::pages.settings.mobile', compact('mobile'));
    }

    public function updateMobile(Request $request, MobileSettings $mobile)
    {
        $request->validate([
            'app_store_url' => 'required',
            'google_play_url' => 'required',
            'ios_app_version' => 'required',
            'android_app_version' => 'required',
        ]);

        $mobile->app_store_url          = $request->app_store_url;
        $mobile->google_play_url        = $request->google_play_url;
        $mobile->ios_app_version        = $request->ios_app_version;
        $mobile->android_app_version    = $request->android_app_version;
        $mobile->save();

        return $this->successRedirect('dashboard.settings.updateMobile', trans("dashboard::messages.setting.updateMobile"));
    }

    public function lang(Request $request)
    {
        session(['lang' => $request->lang]);
        return \redirect()->back();
    }
}
