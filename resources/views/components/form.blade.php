@props([
    'method' => 'POST',
    'action' => '#',
    'enctype' => '',
])

<form method="post"
    action="{{ $action }}"
    {{ $attributes->merge([
        'class' => 'm-0',
    ]) }} enctype ="{{ $enctype }}">

    @method($method)
    @csrf

    {!! $slot !!}
</form>
