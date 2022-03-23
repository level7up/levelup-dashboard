<x-dashboard::layout.setting title="Logos"
    route="dashboard.settings.updateLogos">

    <x-dashboard::form.img-input name='default'
        title="Default Logo"
        value='{{ $logo->default }}'>
        <p>Should be 180x50</p>
    </x-dashboard::form.img-input>

    <x-dashboard::form.img-input name='default_dark'
        title="Default dark logo"
        value='{{ $logo->default_dark }}'>
        <p>Should be 180x50</p>
    </x-dashboard::form.img-input>

    <x-dashboard::form.img-input name='favicon'
        title="Favicon logo"
        value='{{ $logo->favicon }}'>
        <p>Should be 60x60</p>
    </x-dashboard::form.img-input>

    <x-dashboard::form.img-input name='favicon_dark'
        title="Favicon dark logo"
        value='{{ $logo->favicon_dark }}'>
        <p>Should be 60x60</p>
    </x-dashboard::form.img-input>

    <x-dashboard::form.img-input name='square'
        title="Square logo"
        value='{{ $logo->square }}'>
        <p>Should be 256x256</p>
    </x-dashboard::form.img-input>

    <x-dashboard::form.img-input name='square_dark'
        title="Square dark logo"
        value='{{ $logo->square_dark }}'>
        <p>Should be 256x256</p>
    </x-dashboard::form.img-input>
</x-dashboard::layout.setting>
