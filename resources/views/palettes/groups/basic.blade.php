<x-dashboard::card class="mb-10"
    accordion="#{{ $group->name }}AccordionGroup"
    accordion-parent="#{{ $group->palette->name }}Accordion"
    :header-class="Arr::first($group->palette->groups)->name == $group->name ? '' : 'collapsed'"
    :body-class="'palette-collapsing-group' . (Arr::first($group->palette->groups)->name == $group->name ? ' show' : '')">
    <x-slot name="header">
        <div class="card-title">
            <h3 class="card-label fw-bolder">
                {{ $label }}
            </h3>
        </div>
    </x-slot>
    @foreach ($inputs as $input)
        {!! $input->render($group) !!}
    @endforeach
</x-dashboard::card>
