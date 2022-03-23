<x-layout.home-setting :locale="$locale"
    title="Services"
    route="dashboard.settings.home.services">
    <input value="{{ $locale }}"
        name='locale'
        type="hidden">

    <x-dashboard::form.input value="{{ $services[$locale]['title'] ?? null }}"
        name='title'>Title</x-dashboard::form.input>
    <x-dashboard::form.input value="{{ $services[$locale]['subtitle'] ?? null }}"
        name='subtitle'>Body</x-dashboard::form.input>

    </x-dashboard::layout.home-setting>
