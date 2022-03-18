@props(['name', 'rows' => 6, 'placeholder' => null, 'value' => old($name)])

<div class="d-flex flex-column mb-10 fv-row fv-plugins-icon-container">
    <label class="form-label fs-6 fw-bolder text-dark"
        for="{{ $name }}">
        {{ $slot }}
    </label>

    <textarea class="form-control form-control-solid"
        rows="{{ $rows }}"
        name="{{ $name }}"
        placeholder="{{ $slot }}">{{ $value }}</textarea>
    <div class="fv-plugins-message-container invalid-feedback"></div>
</div>
