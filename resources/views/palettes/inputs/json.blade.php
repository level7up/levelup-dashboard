<x-dashboard::form-group :title="$label"
    :formGroupClass="$attributes['form-group-class'] ?? null"
    :name="$name"
    inline>
    <x-dashboard::flex gap="3">
        @foreach ($value as $k => $v)
            <div class="flex-grow-1">
                <x-dashboard::form.time name="{{ $name }}[{{ $k }}]"
                    :value="$v"
                    inset />
            </div>
        @endforeach
    </x-metronic::flex>
</x-metronic::form-group>
