<x-dashboard::full :title="Auth::user()->name . '\'s'">
    {{-- @dd($admin) --}}
    <div class="d-flex flex-column flex-lg-row">
        <div class="w-lg-250px w-xl-350px mb-10">
            <div class="card mb-5 mb-xl-8">
                <div class="card-body">
                    <div class="d-flex flex-center flex-column py-5">
                        <div class="symbol symbol-100px symbol-circle mb-7">
                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <a href="#"
                            class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ Auth::user()->name }}</a>
                        <div class="mb-9">
                            <div class="badge badge-lg badge-light-primary d-inline">{{ Auth::user()->roles }}</div>
                        </div>
                    </div>
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details"
                            role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                            <span class="ms-2 rotate-180">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                            </span>
                        </div>
                        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                            data-bs-original-title="Edit customer details">
                            <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                data-bs-target="#update_modal">Edit</a>
                        </span>
                    </div>
                    <div class="separator"></div>
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <div class="fw-bolder mt-5">Account ID</div>
                            <div class="text-gray-600">ID-{{ Auth::id() }}</div>
                            <div class="fw-bolder mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{ Auth::user()->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex-lg-row-fluid ms-lg-15">

        </div>
    </div>
    <div class="modal fade" id="update_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <x-dashboard::card.form title="Edit admin: {{ $admin->name }}" method="put" :action="route('dashboard.profile.update', $admin->id)">
                        <x-dashboard::form.input type="text" name="name" :value="$admin->name" />
                        <x-dashboard::form.input type="text" name="email" :value="$admin->email" />

                        <x-dashboard::form.input-disabled value="{{ $admin->getRoles() }}" data-bs-toggle="modal"
                            data-bs-target="#assign_role">
                            Role
                        </x-dashboard::form.input-disabled>

                        <x-slot name="footer">
                            <x-dashboard::flex>
                                @livewire('dashboard::toggle', ['model'=> $admin,'prop' =>'deleted_at' ])
                                <span class="ms-3 me-5 fw-bolder">Enable / Disable</span>
                            </x-dashboard::flex>

                            <x-dashboard::btn data-bs-toggle="modal" data-bs-target="#assign_role" color="light-danger">
                                Assign Role
                            </x-dashboard::btn>
                        </x-slot>

                    </x-dashboard::card.form>

                    <x-dashboard::modal.form :action="route('dashboard.assignrole', $admin->id)" id="assign_role"
                        title="Assign role for {{ $admin->name }}">
                        <select name="role" class="form-select form-select-solid mb-4">
                            @foreach ($roles as $name)
                                <option value="{{ $name }}" @if ($admin->getRoleNames()->contains($name)) selected @endif>
                                    {{ $name }}</option>
                            @endforeach
                        </select>
                    </x-dashboard::modal.form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard::full>
