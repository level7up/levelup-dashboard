<x-dashboard::full :title="$palette->title">
    <x-slot name="toolbarButtons">
        @foreach (config('app.supported_languages') as $key)
            <a href="{{ route('dashboard.palette.show', [$palette->menu, $palette->name, $key]) }}">
                {{-- {!! Language::getLabel($key) !!} --}}
            </a>
        @endforeach
    </x-slot>

    <x-dashboard::form :action="route('dashboard.palette.store', [$palette->menu, $palette->name, $palette->language])">
        <div class="d-flex flex-col flex-lg-row">
            <div class="flex-column flex-lg-row-auto w-100 w-lg-300px mb-10 mb-lg-0">
                <div data-kt-sticky="true"
                    data-kt-sticky-name="palette-{{ $palette->name }}"
                    data-kt-sticky-offset="{default: false, xl: '0px'}"
                    data-kt-sticky-width="{lg: '300px'}"
                    data-kt-sticky-left="auto"
                    data-kt-sticky-top="150px"
                    data-kt-sticky-animation="false"
                    data-kt-sticky-zindex="95">
                    <x-dashboard::card flush>
                        <h6 class="bold">
                            @lang('dashboard::keywords.settings')
                        </h6>
                        {{-- <x-dashboard::divider /> --}}

                        <x-dashboard::form.submit id="palette-save-btn"
                            class="w-100 mb-10">
                            @lang('dashboard::keywords.save')
                        </x-dashboard::form.submit>

                        <div
                            class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary">
                            @foreach ($list as $item)
                                <div class="menu-item mb-3">
                                    <a href="{{ route('dashboard.palette.show', [$item->menu, $item->name, $palette->language]) }}"
                                        @class(['menu-link', 'active' => $item instanceof $palette])>
                                        <span class="menu-icon">
                                            <span class="svg-icon svg-icon-2 me-3">
                                                @svg($item->icon)
                                            </span>
                                        </span>
                                        <span class="palette-menu-title menu-title fw-bold">{{ $item->title }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </x-dashboard::card>

                    <x-dashboard::card class="mt-5"
                        flush>
                        <h6 class="bold">
                            @lang('ui::keywords.setting_groups')
                        </h6>
                        {{-- <x-dashboard::divider /> --}}

                        <div id="groupCollapsingHandlerContainer"
                            class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary">
                            @foreach ($palette->groups as $group)
                                <div class="menu-item mb-3">
                                    <a href="javascript:;"
                                        {{ Arr::toAttributes(['data-bs-toggle' => 'collapse', 'data-bs-target' => "#{$group->name}AccordionGroup"]) }}
                                        @class(['menu-link', 'active' => $loop->first])>
                                        <span class="menu-icon">
                                            <span @class(['svg-icon svg-icon-2 me-3'])
                                                @unless($loop->first) style="display:none;" @endunless>
                                                @svg('ss')
                                                {{-- <x-duotune-arrows-074 /> --}}
                                            </span>
                                        </span>
                                        <span class="palette-menu-title menu-title fw-bold">{{ $group->label }}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </x-dashboard::card>
                </div>
            </div>

            <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10"
                id="{{ $palette->name }}Accordion">
                @foreach ($palette->groups as $group)
                    {!! $group->render() !!}
                @endforeach
            </div>
        </div>
    </x-dashboard::form>

    @push('scripts')
        <script>
            (function() {
                $('.palette-collapsing-group').on('show.bs.collapse', function() {
                    $('#groupCollapsingHandlerContainer .active').removeClass('active');
                    $('#groupCollapsingHandlerContainer .svg-icon').slideUp();
                    $(`#groupCollapsingHandlerContainer *[data-bs-target='#${$(this).attr('id')}']`).addClass(
                        'active');
                    $(`#groupCollapsingHandlerContainer *[data-bs-target='#${$(this).attr('id')}'] .svg-icon`)
                        .slideDown();
                })
            })()
        </script>
    @endpush
</x-dashboard::full>
