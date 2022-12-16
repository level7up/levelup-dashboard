@props(['title', 'route', 'locale' => 'en'])

<x-dashboard::full title="Home Settings">
    <x-dashboard::card class="mb-9 pb-0" body-class="pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
            <div
                class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                <img class="mw-50px mw-lg-75px" src="{{ setting('Logo', 'square') }}" alt="image">
            </div>

            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <span class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">
                                Front home page settings
                            </span>
                        </div>

                    </div>
                    <div class="d-flex mb-4">
                        <a href="{{ $locale == 'ar' ? './en' : './ar' }}" class="btn btn-sm btn-primary me-3"
                            data-bs-target="#kt_modal_new_target">{{ $locale == 'en' ? 'Edit Arabic' : 'Edit English' }}</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="separator"></div>

        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
            <!--begin::Nav item-->
            <li class="nav-item">
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateGeneral',
                ]) href="{{ route('dashboard.settings.updateGeneral', 'en') }}">
                    General Settings
                </a>
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateLogos',
                ]) href="{{ route('dashboard.settings.updateLogos') }}">
                    Logo Settings
                </a>
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateSocial',
                ]) href="{{ route('dashboard.settings.updateSocial') }}">
                    Social Settings
                </a>
                {{-- <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateMobile',
                ]) href="{{ route('dashboard.settings.updateMobile') }}">
                    Mobile Settings
                </a> --}}
            </li>
            <!--end::Nav item-->
        </ul>
    </x-dashboard::card>
    <x-dashboard::form :action="route($route)" enctype="multipart/form-data">
        <x-dashboard::card>
            <x-slot name="header">
                <div class="card-title fs-3 fw-bolder">
                    {{ $title }}
                </div>
            </x-slot>

            <div class="p-9">
                {!! $slot !!}
            </div>

            <x-slot name="footer">
                <x-dashboard::flex x="end">
                    <x-dashboard::form.submit>
                        Save Changes
                    </x-dashboard::form.submit>
                </x-dashboard::flex>
            </x-slot>
        </x-dashboard::card>
    </x-dashboard::form>
</x-dashboard::full>
