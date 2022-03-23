@props(['items'])

<x-dashboard::card>

    @isset($items)
        @if ($items->hasPages())
            <x-slot name="footer">
                {{ $items->links() }}
            </x-slot>
        @endif
    @endisset

    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="table-responsive">
            <table @class([
                'table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer table-hover',
            ])>
                {!! $slot !!}
            </table>
        </div>
    </div>
</x-dashboard::card>