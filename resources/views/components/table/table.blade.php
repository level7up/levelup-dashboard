@props([])

<div class="dataTables_wrapper dt-bootstrap4 no-footer">
    <div class="table-responsive">
        <table @class([
            'table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer table-hover',
        ])>
            {!! $slot !!}
        </table>
    </div>
</div>
