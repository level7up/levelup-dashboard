<x-dashboard::full title="Create role">
    <x-dashboard::card.form action='{{ route("dashboard.{$route_group}.roles.store") }}' title="Create a new role">
        <x-dashboard::form.input name='name'>Role Name</x-dashboard::form.input>
    </x-dashboard::card.form>
</x-dashboard::full>
