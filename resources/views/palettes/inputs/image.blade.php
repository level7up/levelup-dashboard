<x-dashboard::form.image :name="$name"
    :id="$attributes['id'] ?? null"
    :value="is_string($value) ? $value : null">
    {{ $label }}
</x-dashboard::form.image>
