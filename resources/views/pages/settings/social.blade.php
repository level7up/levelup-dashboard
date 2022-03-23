<x-dashboard::layout.setting title="Social"
    route="dashboard.settings.updateSocial">

        <x-dashboard::form.input value='{{$social->facebook}}'  type="url" name='facebook'>Facebook</x-dashboard::form.input>

        <x-dashboard::form.input value='{{$social->twitter}}'   type="url" name='twitter'>Twitter</x-dashboard::form.input>

        <x-dashboard::form.input value='{{$social->linkedin}}'  type="url" name='linkedin'>Linkedin</x-dashboard::form.input>

        <x-dashboard::form.input value='{{$social->instagram}}' type="url" name='instagram'>Instagram</x-dashboard::form.input>

        <x-dashboard::form.input value='{{$social->snapchat}}'  type="url" name='snapchat'>Snapchat</x-dashboard::form.input>

        <x-dashboard::form.input value='{{$social->tiktok}}'    type="url" name='tiktok'>Tiktok</x-dashboard::form.input>

</x-dashboard::layout.setting>