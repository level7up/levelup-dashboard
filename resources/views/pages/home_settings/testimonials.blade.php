

<x-layout.home-setting :locale="$locale" title="Testimonials" route="dashboard.settings.home.testimonials">
    <input value="{{$locale}}" name='locale' type="hidden"> 

    <x-dashboard::form.input value="{{$testimonials[$locale]['title'] ?? ''}}" name='title'>title</x-dashboard::form.input>

   <div id="testimonials">
    <x-dashboard::form-group title="List" name="list">
        <div data-repeater-list="testimonials">
            @foreach ($testimonials[$locale]['list'] as $key => $list)
                <div data-repeater-item class="container-fluid mb-3">
                    <x-dashboard::flex gap="3" y="start">
                            <div >
                                <label class="form-label">Title:</label>
                                <input type="text" name='title' value="{{$list['title'] ?? ''}}" class="form-control mb-2 mb-md-0" placeholder="Enter title" />
                            </div>
                            
                            <div >
                                <label class="form-label">Rate:</label>
                                <input type="text" name='rate' value="{{$list['rate'] ?? ''}}" class="form-control mb-2 mb-md-0" placeholder="Enter rate number" />
                            </div>

                            <div >
                                <span class="form-label">Body:</span>
                                <textarea name='body' class="form-control mb-2 mb-md-0" style="resize: none">{{$list['body'] ?? ''}}</textarea>
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
                $('#testimonials').repeater({
                    initEmpty: false,

                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
        </script>
    @endpush
</x-dashboard::layout.home-setting>