@props(['options', 'inset' => false, 'id' => uniqid('select-'), 'value' => old($name), 'name'])

@php
if (!is_array($value)) {
    $value = [$value];
}
@endphp

<div @class([
    'mb-5' => !$inset,
])>
    <label class="form-label fs-6 fw-bolder text-dark"
        for="{{ $id }}">
        @if (strlen($slot) > 0)
            {!! $slot !!}
        @else
            {{ ucfirst($name) }}
        @endif
    </label>

    <select {{ $attributes->merge([
        'class' => 'form-select form-select-solid',
        'name' => $name,
    ]) }}>
        <option disabled>Please select</option>

        @foreach ($options as $val => $option)
            <option value="{{ $val }}"
                @if (in_array($val, $value)) selected @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>

    @error($name)
        <span class="invalid-feedback"
            role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
