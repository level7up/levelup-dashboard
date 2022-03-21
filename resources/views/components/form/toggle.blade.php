@props(['name', 'id' => uniqid('switch-'), 'checked' => false])

<div class="form-check form-switch form-check-custom form-check-solid">
    <input @isset($name) name="{{ $name }}" @endisset
        @if ($checked) checked @endif
        class="form-check-input"
        type="checkbox"
        id="{{ $id }}"
        {{ $attributes }} />

    @if (strlen($slot) > 0)
        <label class="form-check-label"
            for="{{ $id }}">
            {!! $slot !!}
        </label>
    @endif
</div>
