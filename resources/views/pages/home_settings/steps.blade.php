

<x-layout.home-setting :locale="$locale" title="Steps" route="dashboard.settings.home.steps">
    <input value="{{$locale}}" name='locale' type="hidden"> 

    <x-dashboard::form.input value="{{$steps[$locale]['title'] ?? ''}}" name='title'>title</x-dashboard::form.input>

    <div id="steps">
        <x-dashboard::form-group title="List" name="list">
            <div data-repeater-list="steps">
                @foreach ($steps[$locale]['list'] as $key => $list)
                    <div data-repeater-item class="container-fluid mb-3">
                        <x-dashboard::flex gap="3" y="start">
                            <div>
                                <label class="form-label">Title:</label>
                                <input type="text" name='title' value="{{$list['title'] ?? ''}}" class="form-control" placeholder="Enter title" />
                            </div>

                            <div class="flex-grow-1">
                                <span class="form-label">Body:</span>
                                <textarea name='body' class="form-control" style="resize: none">{{$list['body'] ?? ''}}</textarea>
                            </div>
                        
                            
                            <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                <i class="la la-trash-o"></i>Delete
                            </a>
                        </x-dashboard::flex>
                    </div>
                @endforeach
            </div>
        </x-dashboard::form-group>
    
        <div class="form-group mt-5">
            <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                <i class="la la-plus"></i>Add
            </a>
        </div>
    </div> 

    
    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#steps').repeater({
                    initEmpty: false,

                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            });
            
        </script>
    @endpush
</x-dashboard::layout.home-setting>