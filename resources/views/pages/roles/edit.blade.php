<x-dashboard::full title="Edit role">
    <x-dashboard::card.form title="Edit: {{ $role->name }}"
        method='put'
        :action='route("dashboard.${route_group}.roles.update", $role->id)'>

        <x-dashboard::form.input value='{{ $role->name }}'
            name='name'>Role Name</x-dashboard::form.input>

        <x-slot name="footer">
            <x-dashboard::btn color="light-danger"
                onclick="document.getElementById('delete-role').submit();">
                Delete role
            </x-dashboard::btn>
        </x-slot>
    </x-dashboard::card.form>

    <x-dashboard::form id="delete-role"
        :action="route('dashboard.'.$route_group.'.roles.destroy', $role->id)"
        method="DELETE"
        class="text-center">
    </x-dashboard::form>

</x-dashboard::full>
