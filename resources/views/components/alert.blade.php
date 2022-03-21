@props(['title', 'icon', 'color' => 'primary'])

@php
if (!isset($icon)) {
    $icon = [
        'primary' => 'ri-information-line',
        'danger' => 'ri-chat-off-line',
        'success' => 'ri-check-double-line',
        'warning' => 'ri-alarm-warning-line',
    ][$color];
}
@endphp

<div class="alert alert-dismissible bg-{{ $color }} d-flex flex-column flex-sm-row p-5 mb-10">
    @isset($icon)
        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">
            @svg($icon, 'text-light')
        </span>
    @endisset

    <div class="d-flex flex-column pe-0 pe-sm-10 text-light">
        @isset($title)
            <h5 class="mb-1 text-light">
                {!! $title !!}
            </h5>
        @endisset

        {!! $slot !!}
    </div>

    <button type="button"
        class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
        data-bs-dismiss="alert">
        <i class="bi bi-x fs-1 text-light"></i>
    </button>
</div>
