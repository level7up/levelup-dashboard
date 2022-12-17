@php
$alertColors = ['success' => 'success', 'error' => 'danger'];
@endphp

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <x-dashboard::alert color="danger"
            :title="$error" />
    @endforeach
@endif

@foreach (['success', 'error'] as $key)
    @if (session()->has($key))
        <x-dashboard::alert :color="$alertColors[$key]"
            :title="session()->get($key)" />
    @endif
@endforeach
