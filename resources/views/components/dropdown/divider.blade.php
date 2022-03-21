@props([
    'y' => '2'
])

<div @class([
    "separator my-${y}"
    
])
    {{ $attributes->except('class') }}
    ></div>
