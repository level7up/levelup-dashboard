{{-- <div class="toolbar bg-white p-5 mb-1" id="hash_full_toolbar">
    <!--begin::Container-->
    <div id="hash_full_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#hash_full_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1" style="margin-right: 1.25rem">
                {{ $title }}
            </h1>
            <!--end::Title-->

            <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                @foreach (explode('/', request()->route()->uri) as $item)
                    @unless(in_array($item, ['dashboard']) || Str::startsWith($item, '{'))
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted">{{ ucwords($item) }}</span>
                        </li>
                    @endunless
                @endforeach
            </ul>
        </div>
        <!--end::Page title-->

        @isset($toolbarButtons)
            <x-dashboard::flex>
                {!! $toolbarButtons !!}
            </x-dashboard::flex>
        @endisset
    </div>
    <!--end::Container-->
</div> --}}
