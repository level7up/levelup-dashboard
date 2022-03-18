
@props([
    'name',
    'minDate' =>false,
    'maxDate' =>false,
    'value' => false,
])

<label class="form-label fs-6 fw-bolder text-dark">
    {!!$slot!!}
</label>

<input id="datepicker" value="{{$value}}" name="{{$name}}" class="form-control form-control-lg form-control-solid">




@push('scripts')
<script>
// console.log('{{$name}}');
// console.log($name);
    $("#datepicker").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: '{{$minDate}}',
        maxDate: '{{$maxDate}}',
    });
</script>
@endpush
