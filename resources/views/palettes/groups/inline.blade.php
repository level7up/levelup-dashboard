<x-dashboard::form-group inline
    :name="$name"
    :id="$attributes['id'] ?? null"
    :title="$label">
    <div class="d-flex justify-content-between align-items-center gap-3">
        @foreach ($inputs as $input)
            {!! $input->inline(false)->attributes(['form-group-class' => 'w-100'])->render($group) !!}
        @endforeach
    </div>
</x-dashboard::form-group>
