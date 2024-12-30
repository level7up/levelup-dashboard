<?php

namespace Level7up\Dashboard\Palette\Inputs;

class Textarea extends Input
{
    public function html(): string
    {
        return view('dashboard::palettes.inputs.textarea', $this->all())->render();
    }
}
