@props([
    'url' => '#',
    'image' => asset('dashboard/media/logos/logo-1.svg'),
    'width' => '50px',
])

<div class="col-sm-12 text-center p-8">
    <a href="{{$url}}"
        class="mb-12">
        <img alt="Logo"
            src="{{$image}}"
            class="h-{{$width}}" />
    </a>
</div>
