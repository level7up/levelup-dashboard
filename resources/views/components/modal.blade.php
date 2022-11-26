@props(['title', 'id'])

<div class="modal fade"
    tabindex="-1"
    id="{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                @isset($title)
                    <h5 class="modal-title">
                        {{ $title }}
                    </h5>
                @endisset
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
            </div>
            <div class="modal-body">
                {!! $slot !!}
            </div>
            <div class="modal-footer">
                <x-dashboard::btn color="danger"
                    data-bs-dismiss="modal">
                    @lang("Cancel")
                </x-dashboard::btn>
                @isset($footer)
                    {!! $footer !!}
                @endisset
            </div>
        </div>
    </div>
</div>
