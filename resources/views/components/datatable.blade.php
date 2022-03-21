@props(['title', 'dataTable'])

<x-dashboard::full :title="$title">
    <x-dashboard::card>
        {{ $dataTable->table() }}
    </x-dashboard::card>

    @push('scripts')
        {{ $dataTable->scripts() }}
    @endpush
</x-dashboard::full>
