<?php

namespace Level7up\Dashboard\Palette\Inputs;

class Json extends Input
{
    /** @var array */
    public $json;

    public function html(): string
    {
        return view('dashboard::palettes.inputs.json', $this->all())->render();
    }

    public function json(array $json = []): self
    {
        $this->json = $json;

        return $this;
    }

    public function getValue()
    {
        return (parent::getValue() ?? []) + ($this->json ?? []);
    }
}
