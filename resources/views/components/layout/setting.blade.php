@props(['title', 'route','locale'])

<x-dashboard::full title="Settings">
    <x-dashboard::card class="mb-9 pb-0"
        body-class="pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
            <!--begin::Image-->
            <div
                class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                <img class="mw-50px mw-lg-75px"
                    src="{{ setting('logo', 'square') }}"
                    alt="image">
            </div>
            <!--end::Image-->
            <!--begin::Wrapper-->
            <div class="flex-grow-1">
                <!--begin::Head-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::Details-->
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center">
                            <span class="text-gray-800 text-hover-primary fs-2 fw-bolder me-3">
                                {{ setting('general', 'site_name') }}
                            </span>
                            <span class="badge badge-light-success me-auto">Pro</span>
                        </div>

                        <x-dashboard::flex class="mb-4 text-small gx-5">
                            <a href="tel:{{ setting('general', 'phone') }}"
                                class="text-gray-800">
                                {{ setting('general', 'phone') }}
                            </a>
                            <a href="email:{{ setting('general', 'email') }}"
                                class="mx-2 text-gray-800">
                                {{ setting('general', 'email') }}
                            </a>
                        </x-dashboard::flex>

                        <div class="fw-bold fs-5 text-gray-400">
                            {{-- {{ setting('general', 'address') }} --}}
                        </div>
                    </div>
                    @isset($locale)
                        <div class="d-flex mb-4">
                            <a href="{{ $locale == 'ar' ? './en' : './ar' }}"
                            class="btn btn-sm btn-primary me-3"
                            data-bs-target="#kt_modal_new_target">{{ $locale == 'en' ? 'Edit Arabic' : 'Edit English' }}</a>
                        </div>
                    @endisset
                    
                    <!--end::Details-->

                    <!--begin::Actions-->
                    {{-- <div class="d-flex mb-4">
                        <a href="#"
                            class="btn btn-sm btn-bg-light btn-active-color-primary me-3"
                            data-bs-toggle="modal"
                            data-bs-target="#kt_modal_users_search">Add User</a>
                        <a href="#"
                            class="btn btn-sm btn-primary me-3"
                            data-bs-toggle="modal"
                            data-bs-target="#kt_modal_new_target">Add Target</a>
                        <!--begin::Menu-->
                        <div class="me-0">
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="bi bi-three-dots fs-3"></i>
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#"
                                        class="menu-link px-3">Create Invoice</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#"
                                        class="menu-link flex-stack px-3">Create Payment
                                        <i class="fas fa-exclamation-circle ms-2 fs-7"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            data-bs-original-title="Specify a target name for future usage and reference"
                                            aria-label="Specify a target name for future usage and reference"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#"
                                        class="menu-link px-3">Generate Bill</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3"
                                    data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="right-end">
                                    <a href="#"
                                        class="menu-link px-3">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#"
                                                class="menu-link px-3">Plans</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#"
                                                class="menu-link px-3">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#"
                                                class="menu-link px-3">Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <!--begin::Switch-->
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input w-30px h-20px"
                                                        type="checkbox"
                                                        value="1"
                                                        checked="checked"
                                                        name="notifications">
                                                    <!--end::Input-->
                                                    <!--end::Label-->
                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                    <!--end::Label-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#"
                                        class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                    </div> --}}
                    <!--end::Actions-->
                </div>
                <!--end::Head-->
                <!--begin::Info-->
                {{-- <div class="d-flex flex-wrap justify-content-start">
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap">
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bolder">29 Jan, 2021</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-bold fs-6 text-gray-400">Due Date</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-danger me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5"
                                            x="11"
                                            y="18"
                                            width="13"
                                            height="2"
                                            rx="1"
                                            transform="rotate(-90 11 18)"
                                            fill="black"></rect>
                                        <path
                                            d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="fs-4 fw-bolder counted"
                                    data-kt-countup="true"
                                    data-kt-countup-value="75">75</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-bold fs-6 text-gray-400">Open Tasks</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        <!--begin::Stat-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5"
                                            x="13"
                                            y="6"
                                            width="13"
                                            height="2"
                                            rx="1"
                                            transform="rotate(90 13 6)"
                                            fill="black"></rect>
                                        <path
                                            d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <div class="fs-4 fw-bolder counted"
                                    data-kt-countup="true"
                                    data-kt-countup-value="15000"
                                    data-kt-countup-prefix="$">$15,000</div>
                            </div>
                            <!--end::Number-->
                            <!--begin::Label-->
                            <div class="fw-bold fs-6 text-gray-400">Budget Spent</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                    </div>
                    <!--end::Stats-->
                    <!--begin::Users-->
                    <div class="symbol-group symbol-hover mb-3">
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Alan Warden">
                            <span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Michael Eberon">
                            <img alt="Pic"
                                src="assets/media/avatars/300-11.jpg">
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Michelle Swanston">
                            <img alt="Pic"
                                src="assets/media/avatars/300-7.jpg">
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Francis Mitcham">
                            <img alt="Pic"
                                src="assets/media/avatars/300-20.jpg">
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Susan Redwood">
                            <span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Melody Macy">
                            <img alt="Pic"
                                src="assets/media/avatars/300-2.jpg">
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Perry Matthew">
                            <span class="symbol-label bg-info text-inverse-info fw-bolder">P</span>
                        </div>
                        <!--end::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="tooltip"
                            title=""
                            data-bs-original-title="Barry Walter">
                            <img alt="Pic"
                                src="assets/media/avatars/300-12.jpg">
                        </div>
                        <!--end::User-->
                        <!--begin::All users-->
                        <a href="#"
                            class="symbol symbol-35px symbol-circle"
                            data-bs-toggle="modal"
                            data-bs-target="#kt_modal_view_users">
                            <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bolder"
                                data-bs-toggle="tooltip"
                                data-bs-trigger="hover"
                                title=""
                                data-bs-original-title="View more users">+42</span>
                        </a>
                        <!--end::All users-->
                    </div>
                    <!--end::Users-->
                </div> --}}
                <!--end::Info-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Details-->
        <div class="separator"></div>
        <!--begin::Nav-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
            <!--begin::Nav item-->
            <li class="nav-item">
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateGeneral',
                ])
                    href="{{ route('dashboard.settings.updateGeneral', 'en') }}">
                    General Settings
                </a>
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateLogos',
                ])
                    href="{{ route('dashboard.settings.updateLogos') }}">
                    Logo Settings
                </a>
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateSocial',
                ])
                    href="{{ route('dashboard.settings.updateSocial') }}">
                    Social Settings
                </a>
                <a @class([
                    'nav-link text-active-primary py-5 me-6',
                    'active' => $route == 'dashboard.settings.updateMobile',
                ])
                    href="{{ route('dashboard.settings.updateMobile') }}">
                    Mobile Settings
                </a>
            </li>
            <!--end::Nav item-->
        </ul>
    </x-dashboard::card>

    {{-- body --}}
    {{-- class="p-9" --}}
    <x-dashboard::form :action="route($route)"
        enctype="multipart/form-data">
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
