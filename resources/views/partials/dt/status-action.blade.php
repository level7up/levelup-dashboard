@php
switch (get_class($model)) {
    default:
        $prop = 'deleted_at';
        break;
}
@endphp

@livewire('dashboard::toggle', ['model' => $model, 'prop' => $prop ])
