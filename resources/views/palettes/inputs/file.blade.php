<x-dashboard::form.input type="file" :name="$name"
:id="$attributes['id'] ?? null"
:value="is_string($value) ? $value : null"
inline>
@php
    $tmp = explode('/',$value);
@endphp
<div class="d-flex flex-column">
    <span>
        {{ $label }}
    </span>
    @if(strlen(end($tmp)) > 0)
        <span class="text text-danger">
            ({{end($tmp)}})
        </span>
    @endif
</div>
{{-- "settings/files/vkTZDZe4AfGKv1bygXN3riNvsudJ8FVTaFAcAEgz" --}}
</x-dashboard::form.input>
