

<x-layout.home-setting :locale="$locale" title="Download App" route="dashboard.settings.home.download_app">

    <input value="{{$locale}}" name='locale' type="hidden"> 

    <x-dashboard::form.image name='download_app_image' title="App Image" value="{{ url($download_app[$locale]['image'])}}" ></x-dashboard::form.image>

    <x-dashboard::form.input value="{{$download_app[$locale]['title']}}" name='title'>Title</x-dashboard::form.input>
    <x-dashboard::form.input value="{{$download_app[$locale]['subtitle']}}" name='subtitle'>Body</x-dashboard::form.input>

</x-dashboard::layout.home-setting>