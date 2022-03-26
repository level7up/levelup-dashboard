<x-dashboard::full title="Roles">
    <x-slot name="toolbarButtons">
        <x-dashboard::btn :href="route('dashboard.'. $route_group .'.roles.create')"
            size="sm"
            color="success">
            Create Role
        </x-dashboard::btn>
    </x-slot>

    <x-dashboard::row>
        @foreach ($roles as $role)
            <x-dashboard::col md="4">
                <x-dashboard::card flush
                    class="m-1"
                    :title="$role->name">

                    <div class="fw-bolder text-gray-600 mb-5">
                        Total users with this role: {{ $role->users->count() }}
                    </div>

                    <div class="d-flex flex-column text-gray-600">
                        @foreach ($role->permissions->take(4) as $role_permision)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>
                                {{ $role_permision->name }}
                            </div>
                        @endforeach
                        @if ($role->permissions->count() > 4)
                            <div class="d-flex align-items-center py-2">
                                <span class="bullet bg-primary me-3"></span>
                                <em>and {{ $role->permissions->count() - 4 }} more...</em>
                            </div>
                        @endif
                    </div>

                    <x-slot name="footer">
                        <x-dashboard::btn color="light-primary"
                            :href='route("dashboard.{$route_group}.roles.show", $role->id)'
                            class="my-1 me-2">View</x-dashboard::btn>
                        <x-dashboard::btn color="light-success"
                            class="my-1"
                            :href="route('dashboard.'.$route_group.'.roles.edit', $role->id)">
                            Edit
                        </x-dashboard::btn>

                    </x-slot>
                </x-dashboard::card>

            </x-dashboard::col>
        @endforeach
        <x-dashboard::col md="4">
            <x-dashboard::card class="m-1">
                <button type="button"
                    class="btn btn-clear d-flex flex-column flex-center mx-auto"
                    data-bs-toggle="modal"
                    data-bs-target="#add_role">
                    <img src="{{ asset('dashboard/media/illustrations/sketchy-1/4.png') }}"
                        class="mw-100 mh-150px mb-7">
                    <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                </button>
            </x-dashboard::card>
        </x-dashboard::col>
    </x-dashboard::row>

    <x-dashboard::form action='{{ route("dashboard.{$route_group}.roles.store") }}'>
        <x:dashboard::modal title="Add Role"
            id="add_role">
            <x-dashboard::form.input name='name'>Role Name</x-dashboard::form.input>

            <x-slot name="footer">
                <x-dashboard::form.submit>Add new role</x-dashboard::form.submit>
            </x-slot>
        </x:dashboard::modal>
    </x-dashboard::form>
</x-dashboard::full>
