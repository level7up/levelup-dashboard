@props([
    'size' => null,
    'sizes' => null,
    'offsets' => null,
    'sm' => null,
    'md' => null,
    'lg' => null,
    'xl' => null,
])
{{-- Usage

    x-dashboard::col size="12:6:6:4:3" => default:sm:md:lg:xl --}}

@php
$cols = ['size', 'sm', 'md', 'lg', 'xl'];

$classes = [];

foreach ($cols as $col) {
    if ($$col) {
        $classes[] = sprintf('col-%s%s', $col == 'size' ? '' : "${col}-", $$col);
    }
}

if ($sizes && strpos($sizes, ':')) {
    // $classes[] = implode(' ', array_map(function($view, $size) { return "col-{$view}${size}" } , ['', 'sm-', 'md-', 'lg-', 'xl-'], explode(':', $sizes)));
}

if ($offsets && strpos($offsets, ':')) {
    // $classes[] = implode(' ', array_map(function($view, $size) { return "offset-{$view}${size}" } , ['', 'sm-', 'md-', 'lg-', 'xl-'], explode(':', $offsets)));
}

if (count($classes) < 1) {
    $classes = ['col-12'];
}

array_push($classes, $attributes->get('class'));
@endphp

<div {{ $attributes->except('class') }}
    class="{{ implode(' ', $classes) }}">
    {!! $slot !!}
</div>
