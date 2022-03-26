<x-dashboard::flex gap="2">
    @foreach ($model->roles as $role)
        <x-dashboard::badge :color="$role->color">
            {{ $role->name }}
        </x-dashboard::badge>
    @endforeach
</x-dashboard::flex>
