@props([
    'logo' => config('dashboard.logo.default'),
    'color' => '#F2C98A',
    'image' => 'dashboard/media/illustrations/sigma-1/15.png',
])

<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
    style="background-color:{{ $color }}">
    <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
        <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
            <a href="{{ route('dashboard.home') }}" class="py-9 mb-5">
                <img alt="{{ config('dashboard.name') }}" src="{{ $logo }}" width="200" />
            </a>
            <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #000000;">
                Welcome to Tabani
            </h1>
            <p class="fw-bold fs-2" style="color: #000000;">
                {!! $slot !!}
            </p>
        </div>
        <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
            style="background-image: url({{ asset($image) }}"></div>
    </div>
</div>
