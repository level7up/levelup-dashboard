<x-dashboard::dropdown.menu placement="bottom-start"
    title="Action">

    @if ($model->viewRoute)
    <x-dashboard::dropdown.item title="View"
        :href="$model->viewRoute" />
    @endif

    @if ($model->editRoute)
        <x-dashboard::dropdown.item title="Edit"
            :href="$model->editRoute" />
    @endif

    @if ($model->deleteRoute)
        <x-dashboard::dropdown.item title="Delete"
            confirm-form="#deleteForm{{ $model->id }}"
            confirm-text="Are you sure you want to proceed deleting ?" />
    @endif

    @if ($model->approvedRoute)
        <x-dashboard::dropdown.item title="Approve"
            confirm-form="#approveForm{{ $model->id }}"
            confirm-text="Are you sure you want to proceed approveing ?" />
    @endif

    @if ($model->cancelRoute)
    <x-dashboard::dropdown.item title="Cancel"
        confirm-form="#cancelForm{{ $model->id }}"
        confirm-text="Are you sure you want to proceed canceling ?" />
    @endif


</x-dashboard::dropdown.menu>

@if ($model->deleteRoute)
    <x-dashboard::form id="deleteForm{{ $model->id }}"
        :action="$model->deleteRoute"
        method="DELETE" />
@endif

@if ($model->approvedRoute)
    <x-dashboard::form id="approveForm{{ $model->id }}"
        :action="$model->approvedRoute"
        method="PUT" />
@endif

@if ($model->cancelRoute)
    <x-dashboard::form id="cancelForm{{ $model->id }}"
        :action="$model->cancelRoute"
        method="PUT" />
@endif
