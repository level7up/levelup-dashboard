<x-dashboard::full title="View Role">
    <x-dashboard::flex y="start"
        class="flex-column flex-lg-row">
        <div class="w-100 w-lg-200px w-xl-300px mb-10">
            <x-dashboard::card class="m-1">
                <div class="card-title">
                    <h2>{{ $role->name }}</h2>
                </div>

                <div class="d-flex flex-column text-gray-600">
                    @foreach ($permissions as $permission)
                        <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>
                            {{ $permission->name }}
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('dashboard.users.roles.edit', $role->id) }}"
                    class="btn btn-light btn-active-light-primary my-1">
                    Edit Role
                </a>
            </x-dashboard::card>
        </div>

        <x-dashboard::flex class="ms-lg-10">
            <x-dashboard::card>
                <x-slot name="header">
                    <h2 class="d-flex align-items-center">Users Assigned
                        <span class="text-gray-600 fs-6 ms-1">({{ $users->count() }})</span>
                    </h2>
                </x-slot>

                <x-dashboard::table.table>
                    <thead>
                        <x-dashboard::table.row>
                            <x-dashboard::table.th class="w-10px pe-2 sorting_disabled"
                                rowspan="1"
                                colspan="1"
                                aria-label=""
                                style="width: 29.25px;">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input"
                                        type="checkbox"
                                        data-kt-check="true"
                                        data-kt-check-target="#kt_roles_view_table .form-check-input"
                                        value="1">
                                </div>
                            </x-dashboard::table.th>
                            <x-dashboard::table.th class="min-w-50px sorting"
                                tabindex="0"
                                aria-controls="kt_roles_view_table"
                                rowspan="1"
                                colspan="1"
                                aria-label="ID: activate to sort column ascending"
                                style="width: 76.4625px;">ID</x-dashboard::table.th>
                            <x-dashboard::table.th class="min-w-150px sorting"
                                tabindex="0"
                                aria-controls="kt_roles_view_table"
                                rowspan="1"
                                colspan="1"
                                aria-label="User: activate to sort column ascending"
                                style="width: 324.587px;">User</x-dashboard::table.th>
                            <x-dashboard::table.th class="min-w-125px sorting"
                                tabindex="0"
                                aria-controls="kt_roles_view_table"
                                rowspan="1"
                                colspan="1"
                                aria-label="Joined Date: activate to sort column ascending"
                                style="width: 198.488px;">Joined Date</x-dashboard::table.th>
                            <x-dashboard::table.th class="text-end min-w-100px sorting_disabled"
                                rowspan="1"
                                colspan="1"
                                aria-label="Actions"
                                style="width: 128.913px;">Actions</x-dashboard::table.th>
                        </x-dashboard::table.row>
                    </thead>
                    <tbody class="fw-bold text-gray-600">
                        @foreach ($users as $user)
                            <tr>
                                <x-dashboard::table.td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            value="1">
                                    </div>
                                </x-dashboard::table.td>
                                <x-dashboard::table.td>{{ $user->id }}</x-dashboard::table.td>
                                <x-dashboard::table.td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="../../demo1/dist/apps/user-management/users/view.html">
                                            <div class="symbol-label">
                                                <img src="{{ $user->avatar_url }}"
                                                    alt="Emma Smith"
                                                    class="w-100">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="../../demo1/dist/apps/user-management/users/view.html"
                                            class="text-gray-800 text-hover-primary mb-1">
                                            {{ $user->name }}
                                        </a>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                </x-dashboard::table.td>
                                <x-dashboard::table.td>{{ $user->created_at }}</x-dashboard::table.td>
                                <x-dashboard::table.td class="text-end">
                                    <x-dashboard::dropdown.menu placement="bottom-start">
                                        <x-slot name="button">
                                            <div class="d-flex btn btn-light btn-active-light-primary btn-sm">
                                                Action
                                                <x-duotune-arrows-072 class="d-flex" />
                                            </div>
                                        </x-slot>
                                        <x-dashboard::dropdown.item title="Edit"
                                            :href="Route('dashboard.users.edit', $user->id)" />
                                        <x-dashboard::dropdown.item title="Delete"
                                            confirm-form="#deleteForm{{ $user->id }}"
                                            confirm-text="Are you sure you want to proceed deleting ?" />
                                    </x-dashboard::dropdown.menu>
                                    <x-dashboard::form id="deleteForm{{ $user->id }}"
                                        :action="route('dashboard.users.destroy', $user->id)"
                                        method="DELETE" />
                                </x-dashboard::table.td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-dashboard::table.table>
            </x-dashboard::card>
        </x-dashboard::flex>
    </x-dashboard::flex>

</x-dashboard::full>
