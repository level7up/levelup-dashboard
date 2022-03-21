@props([
    'vertical' => false,
    'stretch' => false,
    'x' => 'between',
    'y' => 'center',
    'gap',
])

<div @class([
    "d-flex align-items-${y} justify-content-${x} {$attributes->get('class')} ",
    'flex-column' => $vertical,
    'w-100' => $stretch,
])
    {{ $attributes->except('class')->merge([
        'style' => isset($gap) ? 'gap: ' . $gap * 0.25 . 'rem' : '',
    ]) }}>
    {!! $slot !!}
</div>
