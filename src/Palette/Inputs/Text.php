<?php

namespace Level7up\Dashboard\Palette\Inputs;

class Text extends Input
{
    public function html(): string
    {
        return view('dashboard::palettes.inputs.text', $this->all())->render();
    }
}
