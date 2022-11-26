@props(['id' => uniqid('input-'), 'type' => 'text', 'name', 'value' => old($name), 'placeholder' => false, 'required' => false, 'inset' => false])

<div @class([
    'mb-5' => !$inset,
])>
    <label class="form-label fs-6 fw-bolder text-dark" for="{{ $id }}">
        @if (strlen($slot) > 0)
            {!! $slot !!}
        @else
            {{ __($name) }}
        @endif
    </label>

    <input id="{{ $id }}" {{ $attributes->except(['class']) }} type="{{ $type }}"
        name="{{ $name }}" value="{{ $value }}" @if ($required) required @endif
        autocomplete="off" placeholder="{{ __($placeholder) }}"
        class="form-control form-control-lg form-control-solid 
        @error($name) is-invalid @enderror
        " />

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
