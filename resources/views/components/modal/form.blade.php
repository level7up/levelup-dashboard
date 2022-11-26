@props(['action' => false, 'id', 'title' => null])

<x-dashboard::form :action="$action" {{ $attributes->except(['class']) }}>
    <x-dashboard::modal :id="$id" :title="$title">
        <x-slot name="footer">
            <x-dashboard::form.submit />
        </x-slot>

        {!! $slot !!}
    </x-dashboard::modal>
</x-dashboard::form>
