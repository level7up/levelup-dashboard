@props(['color' => false, 'icon' => false, 'title' => false, 'model' => null])

<div class="col-sm-12 col-md-6 col-lg-3">
    <a href="{{ route('dashboard.' . $title . '.index') }}" class="text-{{ $color }} fw-bolder fs-3">
        <div class="card align-items-center align-content-center bg-light-{{ $color }} rounded-2 mb-7">
            <span class="svg-icon align-items-center svg-icon-5x svg-icon-{{ $color }} d-block my-2 ">
                @if ($icon)
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                        @svg($icon)
                    </svg>
                @endif
            </span>
            @if ($title)
                {{ $model->count() . ' ' . ucFirst($title) }}
            @endif
        </div>
    </a>
</div>
