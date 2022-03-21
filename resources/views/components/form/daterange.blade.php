@props([
    'name',
    'minDate' => false,
    'maxDate' => false,
    'id' => uniqid('dt-picker'),
    'format' => 'DD/MM/Y',
    'value'=> false,
])

<div class="mb-0">
    <label class="form-label">{!! $slot !!}</label>
    <input name="{{ $name }}"
        class="form-control form-control-solid"
        placeholder="Pick date rage"
        id="{{ $id }}" value="{{$value}}" />
</div>
@isset($value)
    @php
        $date = explode('_', $value);
        $start = date('d/m/Y', strtotime($date[0]));
        $end = date('d/m/Y', strtotime($date[1]));
    @endphp

@endisset

@push('scripts')
    <script>
        $("#{{ $id }}").daterangepicker({
            showDropdowns: true,
            startDate: '{{ $start }}',
            endDate: '{{ $end }}',
            minDate: '{{ $minDate }}',
            maxDate: '{{ $maxDate }}',
            locale: {
                format: "{{ $format }}"
            }
        });
    </script>
@endpush
