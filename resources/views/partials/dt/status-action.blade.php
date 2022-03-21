@php
switch (get_class($model)) {
    case "HashStudio\Dashboard\Models\PromoCode":
        $prop = 'deleted_at_reversed';
        break;
    default:
        $prop = 'deleted_at';
        break;
}
@endphp

@livewire('dashboard::toggle', ['model' => $model, 'prop' => $prop ])
