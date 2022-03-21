@props(['name', 'id' => uniqid('ckeditor'), 'inset' => false, 'value' => old($name)])

<x-dashboard::form-group :inset="$inset"
    :name="$name"
    {{ $attributes }}
    :title="$slot">
    <textarea name="{{ $name }}"
        id="{{ $id }}"
        class="kt_docs_ckeditor_classic">
        {{ $value }}
    </textarea>
</x-dashboard::form-group>
