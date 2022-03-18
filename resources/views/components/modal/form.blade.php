@props(['action', 'id', 'title' => null])

<x-dashboard::form :action="$action">
    <x-dashboard::modal :id="$id"
        :title="$title">
        <x-slot name="footer">
            <x-dashboard::form.submit />
        </x-slot>

        {!! $slot !!}
    </x-dashboard::modal>
</x-dashboard::form>
