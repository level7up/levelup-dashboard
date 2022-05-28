@props(['action' => false, 'id', 'title' => null])

<x-dashboard::form @if (isset($action)) :action="$action" @endif {{ $attributes->except(['class']) }}>
    <x-dashboard::modal :id="$id" :title="$title">
        <x-slot name="footer">
            <x-dashboard::form.submit />
        </x-slot>

        {!! $slot !!}
    </x-dashboard::modal>
</x-dashboard::form>
