<x-dashboard::layout.setting title="General" route="dashboard.settings.updateGeneral" locale="{{ $locale }}">
    <input value="{{ $locale }}" name='locale' type="hidden">

    <x-dashboard::form.input value="{{ $general->site_name }}" name='site_name'>Site Name</x-dashboard::form.input>

    <x-dashboard::form.input value="{{ $general->email }}" type='email' name='email'>Email</x-dashboard::form.input>

    <x-dashboard::form.input value="{{ $general->phone }}" name='phone'>Phone</x-dashboard::form.input>
    <x-dashboard::form.input value="{{ $general->mainColor }}" type="color" name='mainColor'>Main Color
    </x-dashboard::form.input>

    <x-dashboard::form.input value="{{ $general->slogan[$locale] }}" name='slogan'>slogan</x-dashboard::form.input>

    <x-dashboard::form.input value="{{ $general->site_description[$locale] }}" name='site_description'>site
        description
    </x-dashboard::form.input>

    <x-dashboard::form.input value="{{ $general->address[$locale] }}" name='address'>Address</x-dashboard::form.input>

    <x-dashboard::form.input value="{{ $general->copyrights[$locale] }}" name='copyrights'>copyrights
    </x-dashboard::form.input>

</x-dashboard::layout.setting>
