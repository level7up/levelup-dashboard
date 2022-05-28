<script src="{{ asset('dashboard/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('dashboard/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
<script src="{{ asset('dashboard/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('dashboard/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('dashboard/js/custom/widgets.js') }}"></script>
<script src="{{ '/vendor/datatables/buttons.server-side.js' }}"></script>
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
<script src="{{ asset('dashboard/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"
integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/dashboard/plugins/custom/formrepeater/formrepeater.bundle.js') }}" defer></script>
<script src="{{ asset('/dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.js"
integrity="sha512-Mvzoyt4FV1aHCRCCF+pXxEi54GK5hO7N6FVL5SYaEBjghkRS0zadyRChyJbsQhEAY6l8S+SR0jXw3a7plFvHPA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@livewireScripts
@livewireSweetalertScripts

@stack('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('.kt_docs_ckeditor_classic').each(function() {
            CKEDITOR.replace($(this).prop('id'));
        });

        $(document).delegate('[confirm-form]', 'click', function(e) {
            e.preventDefault();

            var $this = $(this),
                $target = $($this.attr('confirm-form'));

            if ($target.length < 1) {
                alert("Error\nCan't find delete form");
                return;
            }

            Swal.fire({
                text: $this.attr('confirm-text'),
                icon: "warning",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
                customClass: {
                    confirmButton: "mx-2 btn btn-primary",
                    cancelButton: "btn btn-danger",
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    $target.submit()
                }
            })
        });

        // Livewire.hook('component.initialized', (component) => {})
        // Livewire.hook('element.initialized', (el, component) => {})
        // Livewire.hook('element.updating', (fromEl, toEl, component) => {})
        // Livewire.hook('element.updated', function(el, component) { })
        // Livewire.hook('element.removed', (el, component) => {})
        // Livewire.hook('message.sent', (message, component) => {})
        // Livewire.hook('message.failed', (message, component) => {})
        // Livewire.hook('message.received', (message, component) => {})
        Livewire.hook('message.processed', function(message, component) {
            $('[data-control="select2"]').select2()
        })

        // $("#daterangepicker").daterangepicker();
    });
</script>
