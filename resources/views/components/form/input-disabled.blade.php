@props(['type' => 'text', 'inset' => false, 'value'])

<div @class([
    'mb-5' => !$inset,
])>
    @if (strlen($slot) > 0)
        <label class="form-label fs-6 fw-bolder text-dark">
            {!! $slot !!}
        </label>
    @endif

    <input {{ $attributes->except(['class']) }}
        disabled
        type="{{ $type }}"
        value="{{ $value }}"
        class="form-control form-control-lg form-control-solid" />
</div>
