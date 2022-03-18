@props(['name', 'placeholder' => false, 'id' => false, 'required' => false, 'options', 'value' => old($name, []), 'inset' => false])

<x-dashboard::form-group {{ $attributes }}
    :inset="$inset"
    :name="$name"
    :title="$slot">

    <select {{ $attributes }}
        class="form-select form-control-lg form-select-solid"
        id="{{ $id }}"
        data-control="select2"
        name="{{ $name }}"
        data-placeholder="{{ $placeholder }} @if ($required) required @endif">

        <option disabled>Please select</option>

        @foreach ($options as $val => $option)
            <option value="{{ $val }}"
                @if (in_array($val, $value)) selected @endif>
                {{ $option }}
            </option>
        @endforeach
    </select>
</x-dashboard::form-group>
