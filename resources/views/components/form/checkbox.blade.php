@props(['id' => uniqid('input-'), 'type' => 'text', 'name', 'value' => old($name), 'placeholder' => false, 'required' => false, 'inset' => false])

<div @class([
    "". $attributes->get('class'),
    'mb-5' => !$inset,
])>
    <input id="{{ $id }}"
        {{ $attributes->except(['class']) }}
        type="checkbox"
        name="{{ $name }}"
        value="{{ $value }}"
        @if ($required) required @endif
        placeholder="{{ $placeholder }}"
        class="form-check-input 
        {{-- @error($name) is-invalid @enderror --}}
        " />
    <label class="form-label fs-6 fw-bolder text-dark"
        for="{{ $id }}">
        @if (strlen($slot) > 0)
            {!! $slot !!}
        @else
            {{ ucfirst($name) }}
        @endif
    </label>



    {{-- @error($name)
        <span class="invalid-feedback"
            role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror --}}
</div>
