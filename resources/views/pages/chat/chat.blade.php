@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
<x-dashboard::full title="Chat">
    <x-dashboard::card title="Chat">

        <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{$user->name}}</a>
                        {{-- <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-semibold text-muted">Active</span>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px"
                    style="height: 476px;">
                    <span id="receiver"></span>
                </div>
            </div>
            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <div class="input-group mb-5">
                    <input type="text" class="form-control" placeholder="Username" id="chat-input"/>
                    <span class="input-group-text" id="basic-addon1">
                        <x-phosphor-paper-plane-tilt-light />
                    </span>
                </div>
                {{-- <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2"> --}}
            </div>
        </div>

    </x-dashboard::card>

    @push('scripts')
        <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"
            integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous">
        </script>
        <script>
            $(function() {
                let ip_address = '192.168.1.55';
                let port = '3000';
                let socket = io('http://' + ip_address + ':' + port);
                let chatInput = $('#chat-input');

                chatInput.on('keyup', function(e) {
                    if (e.keyCode === 13) {
                        let message = chatInput.val();
                        let user_id = {{ auth()->user()->id }};
                        const data = {
                            message: message,
                            user_id: user_id,
                            'user_name': '{{ auth()->user()->name }}'
                        };
                        socket.emit('send', data);
                        chatInput.val('');
                        return false;
                    }
                });
                socket.on('receive', function(data) {
                    console.log(data);
                    if (data.user_id === {{ auth()->user()->id }}) {
                        let userImage = '{{auth()->user()->avatar_url}}';
                        // console.log(useImage);
                        $('#receiver').append(`<div class="d-flex justify-content-end mb-10">
                        <div class="d-flex flex-column align-items-end">
                            <div class="p-5 rounded bg-light-primary d-flex text-dark fw-semibold text-end"
                                data-kt-element="message-text">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${userImage}">
                                </div>
                                <span class="m-l-5">
                                    ${data.message}
                                </span>
                            </div>
                        </div>
                    </div>`).clone();
                    }else{
                        toastr.success('New message from ' + data.user_name);
                        let userImage = '{{\App\Models\User::find($user->id)->avatar_url}}';
                        $('#receiver').append(`<div class="d-flex justify-content-start mb-10">
                        <div class="d-flex flex-column align-items-start">
                            <div class="p-5 rounded bg-light-info d-flex text-dark fw-semibold text-start"
                                data-kt-element="message-text">
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="${userImage}">
                                </div>
                                <span>
                                    ${data.message}
                                </span>
                            </div>
                        </div>
                    </div>`).clone();
                    }
                });
                socket.on('connect', function() {
                    console.log('connected');
                });
            })
        </script>
    @endpush
</x-dashboard::full>
