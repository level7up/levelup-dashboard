<?php

namespace Level7up\Dashboard\Providers\Traits;

use Livewire\Livewire;
use Level7up\Dashboard\Http\Livewire\Toggle;

trait BootLivewireComponents
{
    public function bootLivewireComponents()
    {
        Livewire::component('dashboard::toggle', Toggle::class);
    }
}