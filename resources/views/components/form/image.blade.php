@props(['name', 'title' => 'Change image', 'value' => '', 'allowTypes' => 'png, jpg, jpeg, svg, gif'])

<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative mx-5 my-3">
    <div class="image-input image-input-outline mb-3" data-kt-image-input="true"
        style="background-image: url('assets/media/svg/avatars/blank.svg')">
        <div class="image-input-wrapper w-125px h-125px bgi-position-center"
            style="background-size: 75%; background-image: url({{ $value }})">
        </div>

        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip" title=""
            data-bs-original-title="{{ $title }}">
            <i class="bi bi-pencil-fill fs-7"></i>

            <input type="file" name="{{ $name }}" accept=".png, .jpg, .jpeg, .svg"
                class="@error($name) is-invalid @enderror">
            <input type="hidden" name="{{ $name }}_remove">

        </label>

        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancel Image">
            <i class="bi bi-x fs-2"></i>
        </span>
    </div>
    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
