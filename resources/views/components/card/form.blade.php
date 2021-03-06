@props(['title' => '', 'method' => 'post', 'action', 'footer', 'header'])

<x-dashboard::form :method="$method" :action="$action" enctype='multipart/form-data'>
    <x-dashboard::card :title="$title">
        @isset($header)
            <x-slot name="header">
                {!! $header !!}
            </x-slot>
        @endisset

        <x-slot name="footer">
            <x-dashboard::flex x="end" gap="3">
                @isset($footer)
                    {!! $footer !!}
                @endisset

                <x-dashboard::form.submit />
            </x-dashboard::flex>
        </x-slot>

        {!! $slot !!}
    </x-dashboard::card>
</x-dashboard::form>
