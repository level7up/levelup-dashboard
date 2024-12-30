<?php

namespace Level7up\Dashboard\Palette\Migrations;

class Group
{
    public $name;

    public $inputs;

    public $groups;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->inputs = collect();
        $this->groups = collect();
    }

    public function addInput(string $key, $default = null): self
    {
        $this->inputs->push([
            'key' => $key,
            'value' => $default,
        ]);

        return $this;
    }

    public function addGroup(string $key, array $inputs = []): self
    {
        $this->groups->push([
            'key' => $key,
            'inputs' => $inputs,
        ]);

        return $this;
    }

    public function text(string $key, $default = null): self
    {
        $this->addInput($key, $default);

        return $this;
    }

    public function image(string $key, string $default = null): self
    {
        $this->addInput($key, $default);

        return $this;
    }
    public function file(string $key, string $default = null): self
    {
        $this->addInput($key, $default);

        return $this;
    }

    public function repeater(string $name, array $inputs = []): self
    {
        $this->addGroup($name, $inputs);

        return $this;
    }
}
