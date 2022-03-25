<div>
    <div class="w-100 position-relative mb-5">
        <span class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute ms-5"
            style="margin-top: 10px;">
            <x-duotune-general-021 />
        </span>

        <input type="text"
            class="form-control form-control-lg form-control-solid px-15"
            wire:model="search"
            placeholder="Search by username, full name or email..." />

        <span wire:loading
            class="position-absolute end-0 lh-0"
            style="margin-top: -32px; margin-right: 35px;">
            <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
        </span>

        @if (strlen($this->search) > 0)
            <button type="button"
                wire:click="$set('search', null)"
                class="btn btn-flush btn-active-color-primary position-absolute end-0 lh-0"
                style="margin-top: -32px; margin-right: 15px;">
                <x-duotune-arrows-061 />
            </button>
        @endif
    </div>

    <div class="py-5">
        <div class="modal-users-list mh-375px scroll-y me-n7 pe-7">
            @foreach ($users as $user)
                <input type="radio"
                    name="patient"
                    id="selectUser{{ $loop->index }}"
                    value="{{ $user->id }}"
                    class="d-none">

                <x-dashboard::flex x="between"
                    class="rounded p-4 bg-opacity-50 cursor-pointer"
                    onclick="$('#selectUser{{ $loop->index }}').click();$(this).closest('.modal-users-list').find('.bg-primary').removeClass('bg-primary');$(this).addClass('bg-primary')"
                    data-bs-dismiss="modal">
                    <div class="symbol symbol-35px symbol-circle">
                        <img alt="Pic"
                            src="{{ $user->avatar_url }}" />
                    </div>

                    <div class="ms-5 flex-grow-1">
                        <span class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $user->name }}</span>
                        <div class="fw-bold text-muted">{{ $user->email }}</div>
                    </div>
                </x-dashboard::flex>

                @unless($loop->last)
                    <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                @endunless
            @endforeach
        </div>

        @if ($users && $users->count() < 1)
            <div class="text-center">
                <div class="fw-bold py-10">
                    <div class="text-gray-600 fs-3 mb-2">No users found</div>
                    <div class="text-muted fs-6">Try to search by name, email...</div>
                </div>

                <div class="text-center px-5">
                    <img src="{{ asset('dashboard/media/illustrations/sketchy-1/1.png') }}"
                        class="w-100 h-200px h-sm-325px" />
                </div>
            </div>
        @endif
    </div>

    <x-dashboard::flex class="mt-15"
        x="between">
        {{-- <button type="reset"
            data-bs-dismiss="modal"
            class="btn btn-light-danger me-3">Cancel</button> --}}

        <span class="text-muted">
            Displaying <b>({{ $users->count() }})</b> of <b>{{ $total }}</b> users
        </span>
    </x-dashboard::flex>
</div>
