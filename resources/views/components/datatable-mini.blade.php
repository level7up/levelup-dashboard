@props(['dataTable'])

<x-dashboard::card>
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
</x-dashboard::card>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
