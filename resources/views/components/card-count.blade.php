@props(['color' => false, 'icon' => false, 'title' => false, 'model' => null])

<div class="card bg-light-{{ $color }} px-6 py-8 rounded-2 mb-7">
    <a href="{{ route('dashboard.' . $title . '.index') }}">
        <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
        <span class="svg-icon svg-icon-3x svg-icon-{{ $color }} d-block my-2">
            @if ($icon)
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 15 15" fill="none">
                    @svg($icon)
                </svg>
            @endif
            @if ($model)
                <a href="#" class="text-{{ $color }} fw-bold fs-6">{{ $model->count() }}</a>
            @endif
        </span>
        <!--end::Svg Icon-->
        <span class="text-{{ $color }} fw-bold fs-6">
            {{ getVariavleName($test) }};
        </span>
    </a>
</div>
