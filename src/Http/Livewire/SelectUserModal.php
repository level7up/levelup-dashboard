<?php

namespace level7up\Dashboard\Http\Livewire;

use App\Models\User;

abstract class SelectUserModal extends Component
{
    public $search;

    public function query()
    {
        return User::query();
    }

    public function render() {
        $users = $this->query()->where(function($q) {
            $q->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%");
        });;

        return view('dashboard::livewire.modal.select-user', [
            'users' => $users->limit(20)->get(),
            'total' => $users->count(),
        ]);
    }
}
