@props(['type' => 'button', 'color' => 'primary', 'size' => null, 'active-color'])


@if ($attributes->has('href'))
    <a {{ $attributes->except('class') }}
        @class([
            "mx-2 btn btn-{$color} btn-{$size} {$attributes->get('class')}" .
            (isset($activeColor)
                ? "btn-active-${activeColor}"
                : "btn-active-light-${color}"),
        ])>
        {!! $slot !!}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->except('class') }}
        @class([
            "btn btn-{$color} btn-{$size} {$attributes->get('class')}" .
            (isset($activeColor)
                ? "btn-active-${activeColor}"
                : "btn-active-light-${color}"),
        ])>
        {!! $slot !!}
    </button>
@endif
