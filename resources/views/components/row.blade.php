@props([])

<div @class(['row'])
    {{ $attributes->except('class') }}>
    {!! $slot !!}
</div>
