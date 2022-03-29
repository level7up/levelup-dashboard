@props(['title', 'dataTable'])

<x-dashboard::full :title="$title">
    <x-dashboard::card>
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </x-dashboard::card>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
</x-dashboard::full>
