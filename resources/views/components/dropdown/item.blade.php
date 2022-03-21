@props([
    'href' => 'javascript:void(0)',
    'title' => false,
])

<div {{ $attributes->merge([
    'class' => 'menu-item px-3 my-1',
]) }}>
    @if ($title)
        <a href="{{ $href }}"
            class="menu-link px-5">{{ $title }}</a>
    @else
        {!! $slot !!}
    @endif
</div>
