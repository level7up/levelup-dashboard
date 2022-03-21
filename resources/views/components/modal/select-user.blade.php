@props(['id' => uniqid('modal')])

<x-dashboard::btn data-bs-toggle="modal" data-bs-target="#{{ $id }}">
    Add Contact
</x-dashboard::btn>

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">

        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <x-duotune-arrows.arr061 width="24" height="24"/>
                </div>
            </div>

            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <div class="text-center mb-13">
                    <h1 class="mb-3">Search Users</h1>
                    <div class="text-muted fw-bold fs-5">Invite Collaborators To Your Project</div>
                </div>

                {!! $slot !!}
            </div>
        </div>

    </div>
</div>