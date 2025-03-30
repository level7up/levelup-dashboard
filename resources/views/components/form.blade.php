@props([
    'method' => 'POST',
    'action' => '#',
    'confirmed' => null,
])

<form method="post"
    action="{{ $action }}"
    {{ $attributes->except('class') }}
    @class(['m-0', 'form-confirmed' => !is_null($confirmed)])
    enctype="multipart/form-data">

    @method($method)
    @csrf

    {!! $slot !!}
</form>
