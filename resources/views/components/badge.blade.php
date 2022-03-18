@props(['color' => 'info'])

<span {{ $attributes->merge([
    'class' => "badge badge-{$color} me-auto",
]) }}>
    {!! $slot !!}
</span>
