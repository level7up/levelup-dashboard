@props([
    'placement' => 'bottom-end',
    'width' => 150,
    'title',
])

<div class="cursor-pointer symbol symbol-30px symbol-md-40px"
    {{ $attributes->except('class') }}
    data-kt-menu-trigger="click"
    data-kt-menu-attach="parent"
    data-kt-menu-placement="{{ $placement }}">

    @isset($button)
        {!! $button !!}
    @elseif(isset($title))
        <x-dashboard::btn color="light"
            size="sm">
            {{ $title }}
            <x-ri-arrow-down-s-line />
        </x-dashboard::btn>
    @endisset
</div>

<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 mw-{{ $width }}px"
    data-kt-menu="true">

    {!! $slot !!}
</div>
