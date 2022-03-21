@props(['name', 'title' => 'Change image', 'value', 'allowTypes' => 'png, jpg, jpeg, svg, gif',])

<div class="row mb-10">
    <div class="col-xl-3">
        <div class="fs-6 fw-bold mt-2 mb-3">{{ $title }}</div>
        {!! $slot !!}
    </div>

    <div class="col-lg-8">
        <div class="image-input image-input-outline mb-3"
            data-kt-image-input="true"
            style="background-image: url('assets/media/svg/avatars/blank.svg')">

            @isset($value)
                <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                    style="background-size: 75%; background-image: url('{{ $value }}')">
                </div>
            @endisset

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                data-kt-image-input-action="change"
                data-bs-toggle="tooltip"
                title=""
                data-bs-original-title="{{ $title }}">
                <i class="bi bi-pencil-fill fs-7"></i>
                <!--begin::Inputs-->
                <input type="file"
                    name="logo[{{ $name }}]"
                    accept=".png, .jpg, .jpeg">
                <input type="hidden"
                    name="{{ $name }}_remove">
                <!--end::Inputs-->
            </label>
            <!--end::Label-->
            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                data-kt-image-input-action="cancel"
                data-bs-toggle="tooltip"
                title=""
                data-bs-original-title="Cancel avatar">
                <i class="bi bi-x fs-2"></i>
            </span>
            <!--end::Cancel-->
            <!--begin::Remove-->
            <x-dashboard::form :action="route('dashboard.settings.defaultLogo',$name)">
                <button type="submit"
                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                    data-bs-toggle="tooltip"
                    title=""
                    data-bs-original-title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </button>
            </x-dashboard::form>
            <!--end::Remove-->
        </div>

        <div class="form-text">Allowed file types: {{ $allowTypes }}.</div>
    </div>
</div>
