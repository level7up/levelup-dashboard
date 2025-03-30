@props(['name', 'title' => 'Change image', 'value' => false, 'allowTypes' => 'png, jpg, jpeg, svg, gif', 'inset' => false, 'inline' => false, 'id' => uniqid('input-image-'), 'canDelete' => true, 'change' => true, 'onDelete'=> false,])

<x-dashboard::form-group :inset="$inset"
    :inline="$inline"
    :name="$name"
    :id="$id"
    {{ $attributes }}
    :title="$slot">
    <div class="position-relative mb-5">
        <div class="image-input"
            data-kt-image-input="true"
            style="background-image: url({{ is_dark('/assets/dashboard/media/svg/files/blank-image-dark.svg', '/assets/dashboard/media/svg/files/blank-image.svg') }})">
            <div class="image-input-wrapper w-125px h-125px bgi-position-center border"
                style="background-image: url({{ is_string($value) ? $value : '/assets/dashboard/media/svg/files/blank-image.svg' }})">
            </div>
            @if ($change)
                <label
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px {{ is_dark('bg-dark-50', 'bg-white') }} shadow"
                    data-kt-image-input-action="change"
                    data-bs-toggle="tooltip"
                    title="@lang('metronic::actions.change_image')"
                    data-bs-original-title="@lang('metronic::actions.change_image')">
                    <span class="svg-icon svg-icon-success">
                        <x-phosphor-pen-nib-light />
                    </span>

                    <input type="file"
                        name="{{ $name }}"
                        accept=".png, .jpg, .jpeg, .svg"
                        {{ $attributes }}>
                    <input type="hidden"
                        name="{{ Str::endsWith($name, ']') ? rtrim($name, ']') . '_remove]' : "{$name}_remove" }}">
                </label>
            @endif

            @if ($value && $canDelete)
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-kt-image-input-action="remove"
                    data-bs-toggle="tooltip"
                    onclick="{{ $onDelete }}"
                    title="@lang('metronic::actions.delete_image')"
                    data-bs-original-title="@lang('metronic::actions.delete_image')">
                    <span class="svg-icon svg-icon-danger">
                        <x-phosphor-trash-duotone />
                    </span>
                </span>

                <input type="hidden"
                    name="{{ Str::endsWith($name, ']') ? rtrim($name, ']') . '_old]' : "{$name}_old" }}"
                    value="{{ $value }}">
            @endif
        </div>
    </div>
</x-dashboard::form-group>
