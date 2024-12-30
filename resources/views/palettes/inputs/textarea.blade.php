<x-dashboard::form.textarea :name="$name"
    :id="$attributes['id'] ?? null"
    :value="old($name, is_array($value) ? ($value[$group->parent_group ? $group->parent_group->palette->language : $group->palette->language] ?? null) : $value)"
    inline>
    {{ $label }}
</x-dashboard::form.textarea>
