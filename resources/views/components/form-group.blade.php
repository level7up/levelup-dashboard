@props(['name', 'id' => uniqid('input-'), 'value' => old($name), 'inset' => false, 'title' => ucfirst($name)])

<div @class([
    'mb-5' => !$inset,
])>
    <label class="form-label fs-6 fw-bolder text-dark"
        for="{{ $id }}">
        {{ $title }}
        @if ($attributes->has('required'))
            <span class="text-danger">&nbsp;*</span>
        @endif
    </label>

    {!! $slot !!}

    @error($name)
        <span class="invalid-feedback"
            role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
