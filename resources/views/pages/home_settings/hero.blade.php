<x-layout.home-setting :locale="$locale"
    title="Hero"
    route="dashboard.settings.home.hero">
    <input value="{{ $locale }}"
        name='locale'
        type="hidden">
    <x-dashboard::form.image name='hero_image'
        title="Hero Image"
        value="{{ url($hero[$locale]['image'] ?? '') }}"></x-dashboard::form.image>
    <x-dashboard::form.input value="{{ $hero[$locale]['title'] ?? null }}"
        name='title'>Title</x-dashboard::form.input>
    <x-dashboard::form.input value="{{ $hero[$locale]['subtitle'] ?? null }}"
        name='subtitle'>Body</x-dashboard::form.input>
    <x-dashboard::form.input value="{{ $hero[$locale]['cta_name'] ?? null }}"
        name='cta_name'>Call to action button</x-dashboard::form.input>
</x-layout.home-setting>
