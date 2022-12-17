<?php

namespace Level7up\Dashboard\Http\Livewire;

class Toggle extends Component
{
    public $model;
    public $checked = false;
    public $prop = 'deleted_at';

    public function updatedChecked()
    {
        $this->toast('Success', 'success', 2000);

        if (!in_array($this->prop, ['deleted_at', 'deleted_at_reversed'])) {
            return $this->model->update([
                $this->prop => !$this->checked
            ]);
        }

        if ($this->model->trashed()) {
            return $this->model->restore();
        }

        return $this->model->delete();
    }

    public function render()
    {
       
        if (in_array($this->prop ,['deleted_at_reversed','deleted_at'])) {
            $this->checked = $this->model->deleted_at == null;
        } else {
            $this->checked = $this->model->{$this->prop};
        }

        return view('dashboard::livewire.toggle');
    }
}