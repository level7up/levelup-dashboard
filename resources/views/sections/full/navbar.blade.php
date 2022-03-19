<div id="kt_header"
    class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2"
            title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="black" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="../../dashboard/dist/index.html"
                class="d-lg-none">
                <img alt="Logo"
                    src="{{ asset('dashboard/media/logos/logo-2.svg') }}"
                    class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch"
                id="kt_header_nav">
            </div>
            <!--end::Navbar-->
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                {{-- begin::top nav left --}}
                <div class="d-flex align-items-stretch"
                    id="kt_header_nav">
                    <div class="header-menu align-items-stretch my-4"
                        data-kt-drawer="true"
                        data-kt-drawer-name="header-menu"
                        data-kt-drawer-activate="{default: true, lg: false}"
                        data-kt-drawer-overlay="true"
                        data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                        data-kt-drawer-direction="end"
                        data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                        data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

                        {{-- @if (get_previous_url())
                            <x-dashboard::btn :href="get_previous_url()"
                                color='light-primary'>
                                Back
                            </x-dashboard::btn>
                        @endif --}}
                    </div>
                </div>
                {{-- end::top nav left --}}

                <!--begin::User menu-->
                <div class="d-flex align-items-center ms-1 ms-lg-3"
                    id="kt_header_user_menu_toggle">
                    {{-- <x-dashboard::dropdown.menu width="275">
                        <x-slot name="button">
                            <img alt="Profile"
                                src="{{ Auth::user()->avatar_url }}" />
                        </x-slot>
                        <x-dashboard::dropdown.item>
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo"
                                        src="{{ Auth::user()->avatar_url }}" />
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}
                                    </div>
                                    <div class="fw-bold text-muted fs-7">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                        </x-dashboard::dropdown.item>
                        <x-dashboard::dropdown.divider></x-dashboard::dropdown.divider>

                        <x-dashboard::dropdown.item title="Account Settings"
                            :href="route('dashboard.profile.settings', Auth::user()->id)" />
                        <x-dashboard::dropdown.item title="Logout"
                            onclick="document.getElementById('logoutForm').submit();" />

                    </x-dashboard::dropdown.menu> --}}
                </div>
                <!--end::User menu-->
                <!--begin::Header menu toggle-->
                <div class="d-flex align-items-center d-lg-none ms-2 me-n3"
                    title="Show header menu">
                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                        id="kt_header_menu_mobile_toggle">
                        <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                    fill="black" />
                                <path opacity="0.3"
                                    d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Wrapper-->
    </div>
</div>
