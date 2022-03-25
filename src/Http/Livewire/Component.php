<?php

namespace Level7up\Dashboard\Http\Livewire;

use Akhaled\LivewireSweetalert\Fire;
use Akhaled\LivewireSweetalert\Toast;
use Akhaled\LivewireSweetalert\Confirm;
use Livewire\Component as BaseComponent;

abstract class Component extends BaseComponent
{
    use Toast, Confirm, Fire;
}