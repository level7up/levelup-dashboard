@php
    $id = uniqid('repeater-');
@endphp
<div id="{{ $id }}">
    <x-dashboard::form-group :title="$label"
        :name="$name">
        <div data-repeater-list="{{ $name }}">
            @foreach ($inputs as $input_group)
                <div data-repeater-item
                    class="container-fluid mb-5">
                    <x-dashboard::flex gap="3"
                        y="start">

                        <div class="flex-grow-1">
                            @foreach ($input_group as $input)
                                {!! $input->html() !!}
                            @endforeach
                        </div>

                        <a href="javascript:;"
                            data-repeater-delete
                            class="btn btn-sm btn-light-danger">
                            <span class="svg-icon svg-icon-danger">
                                @svg('ss')
                                {{-- <x-duotune-general-027 /> --}}
                            </span>
                            @lang('dashboard::actions.delete')
                        </a>
                    </x-dashboard::flex>
                </div>
            @endforeach
        </div>
    </x-dashboard::form-group>

    <div class="form-group mt-5">
        <a href="javascript:;"
            data-repeater-create
            class="btn btn-light-primary">
            <span class="svg-icon svg-icon-primary">
                @svg('ss')
                {{-- <x-duotune-arrows-075 /> --}}
            </span>
            @lang('dashboard::actions.create')
        </a>
    </div>
</div>

@requirePlugin(formrepeater)

@push('scripts')
    <script>
        (function() {
            $('#{{ $id }}').repeater({
                initEmpty: false,

                show: function() {
                    $(this).slideDown();
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
        })();
    </script>
@endpush
