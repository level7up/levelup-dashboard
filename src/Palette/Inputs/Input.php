<?php

namespace Level7up\Dashboard\Palette\Inputs;

use Level7up\Dashboard\Palette\Group;
use Level7up\Dashboard\Palette\Repeater;

abstract class Input
{

    /** @var bool */
    public $translated;

    /** @var bool */
    public $inline = true;

    /** @var string */
    public $label;

    /** @var string */
    public $name;

    /** @var \Level7up\Dashboard\Palette\Group */
    public $group;

    /** @var int|string|array<mixed, mixed> */
    public $value;

    /** @var int|string|array<mixed, mixed> */
    public $default;

    /** @var string|array<int, string> */
    public $rules;

    /** @var array<string, string> */
    public $attributes = [];

    public function __construct($args = [])
    {
        if (isset($args[0])) {
            $this->name($args[0]);
        }
    }
    public static function make(...$args)
    {
        return new static($args);
    }
    public function label(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function name(string $name): self
    {
        $this->name = '‎'.class_basename(static::class).'‎'.$name;

        return $this;
    }

    public function translated(bool $translated = true): self
    {
        $this->translated = $translated;

        return $this;
    }

    public function inline(bool $inline = true): self
    {
        $this->inline = $inline;

        return $this;
    }

    public function value($value): self
    {
        $this->value = $value;

        return $this;
    }

    public function default($default): self
    {
        $this->default = $default;

        return $this;
    }

    public function rules($rules): self
    {
        $this->rules = $rules;

        return $this;
    }

    public function setGroup(Group $group)
    {
        $this->group = $group;

        return $this;
    }

    public function attributes(array $attributes = []): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function render(Group $group): string
    {
        $this->setGroup($group);

        $this->name = "{$this->group->name}[{$this->name}]";
        return $this->html();
    }

    public function getValue()
    {
        if (!is_null($this->value)) {
            return $this->value;
        }

        $name = str_replace([
            "{$this->group->name}[‎".class_basename(static::class).'‎',
            ']',
            '‎'.class_basename(static::class).'‎'
        ],'', $this->name);

        if ($this->group instanceof Repeater) {
            // this affect repeater multiple inputs
            // if (strpos($this->group->name, "[{$name}]")) {
                $name = str_replace([$this->group->parent_group->name."[", "]"], "", $this->group->name);
            // }

            $query = $this->group->parent_group->palette->query->where('group', $this->group->parent_group->name);
        } else {
            $query = $this->group->palette->query->where('group', $this->group->name);
        }

        $query = optional($query->where('name', $name)->first())->payload;

        // if (is_null($this->group->palette->query->where('group', $this->group->name)->where('name', $name)->first())) {
        //     dd($this->group->palette->query->toArray());
        // }

        return $query;
    }

    public function all(): array
    {
        return [
            'group' => $this->group,
            'label' => $this->label,
            'name' => $this->name,
            'translated' => $this->translated,
            'value' => $this->getValue(),
            'default' => $this->default,
            'attributes' => $this->attributes,
            'inline' => $this->inline,
        ];
    }

    abstract public function html(): string;
}
