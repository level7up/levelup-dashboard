<x-dashboard::layout.setting title="Mobile"
    route="dashboard.settings.updateMobile">

        <x-dashboard::form.input value='{{$mobile->app_store_url ?? ""}}'  type="url" name='app_store_url'>
            App store url
        </x-dashboard::form.input>

        <x-dashboard::form.input value='{{$mobile->google_play_url ?? ""}}'  type="url" name='google_play_url'>
            Google play url
        </x-dashboard::form.input>

        <x-dashboard::form.input value='{{$mobile->ios_app_version ?? ""}}' name='ios_app_version'>
            IOS App version
        </x-dashboard::form.input>

        <x-dashboard::form.input value='{{$mobile->android_app_version ?? ""}}' name='android_app_version'>
            Android App version
        </x-dashboard::form.input>

</x-dashboard::layout.setting>