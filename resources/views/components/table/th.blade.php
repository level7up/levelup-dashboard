@props([
    'rowspan' => '1',
    'colspan' => '1',
    'sorting' => false,
])

<th @class(["min-w-10px pe-2 ${sorting}"])
        rowspan="{{$rowspan}}"
        colspan="{{$rowspan}}"
        {{ $attributes->except('class') }}>
        {!!$slot!!}
</th>