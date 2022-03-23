

<x-layout.home-setting :locale="$locale" title="Suggested" route="dashboard.settings.home.suggested">

    <input value="{{$locale}}" name='locale' type="hidden"> 
    <x-dashboard::form.input value="{{$suggested[$locale]['title']}}" name='title'>Title</x-dashboard::form.input>
    <x-dashboard::form.input value="{{$suggested[$locale]['subtitle']}}" name='subtitle'>Body</x-dashboard::form.input>

</x-dashboard::layout.home-setting>