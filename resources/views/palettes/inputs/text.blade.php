<x-dashboard::form.input :name="$name"
    :id="$attributes['id'] ?? null"
    :formGroupClass="$attributes['form-group-class'] ?? null"
    :value="old($name, is_array($value) ? ($value[$group->parent_group ? $group->parent_group->palette->language : $group->palette->language] ?? null) : $value)"
    :inline="$inline">
    {{ $label }}
</x-metronic::form.input>
