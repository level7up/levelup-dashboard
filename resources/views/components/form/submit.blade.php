@props(['color' => 'primary', 'size' => null])

<x-dashboard::btn type="submit"
    :color="$color"
    :size="$size"
    {{ $attributes }}>

    @if (strlen($slot) > 0)
        {!! $slot !!}
    @else
        @lang("Save")
    @endif
</x-dashboard::btn>
