<?php

namespace Level7up\Dashboard\Palette;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Level7up\Dashboard\Palette\Concerns;
use Level7up\Dashboard\Palette\Inputs\Image;
use Level7up\Dashboard\Palette\Inputs\Input;

class Group
{
    use Concerns\GroupHasInputs;

    /** @var string */
    public $label;

    /** @var string */
    public $name;

    /** @var string */
    public $template = 'basic';

    /** @var array<int, \Level7up\Dashboard\Palette\Inputs\Input> */
    public $inputs = [];

    /** @var array<string, string> */
    public $attributes = [];

    /** @var \Level7up\Dashboard\Palette\Group */
    public $parent_group;

    /** @var \Level7up\Dashboard\Palette\Palette */
    public $palette;

    function __construct($args = [])
    {
        if (isset($args[0]) && is_array($args[0])) {
            $this->inputs = array_map(fn($i) => $i->setGroup($this), $args[0]);
        }

        if (isset($args[0]) && is_callable($args[0])) {
            $args[0]($this);
        }

        $this->name(debug_backtrace()[2]['function']);
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
        $this->name = $name;

        return $this;
    }

    public function template(string $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function inputs(array $inputs): self
    {
        $this->inputs = $inputs;

        return $this;
    }

    public function attributes(array $attributes = []): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function parentGroup(Group $group): self
    {
        $this->parent_group = $group;

        return $this;
    }

    public function setGroup(Group $group): self
    {
        return self::parentGroup($group);
    }

    public function find(string $key)
    {
        foreach (explode(".", $key) as $search) {
            $input = Arr::first($this->inputs, function($input) use ($search, $key) {
                switch (get_class($input)) {
                    case Group::class:
                        dd($key, $search);
                        break;

                    case Repeater::class:
                        return $input->name == $search;

                    case Image::class:
                        return Str::is(["*‎$search", "*‎".rtrim($search, "_remove")], $input->name);

                    default:
                        return Str::is("*‎$search", $input->name);
                }
            });
        }

        return $input;
    }

    public function render(Group $group = null): string
    {
        $this->parent_group = $this != $group ? $group : null;

        return view("dashboard::palettes.groups.{$this->template}", $this->all())
            ->render();
    }

    /**
     * Get all classes properties
     *
     * @return array<string, string|mixed>
     */
    public function all(): array
    {
        $this->updatesSubGroups();

        return [
            'group' => $this,
            'parent_group' => $this->parent_group,
            'label' => $this->label,
            'name' => $this->name,
            'inputs' => $this->inputs,
            'attributes' => $this->attributes,
        ];
    }

    /**
     * Update subgroup names for both groups and input
     *
     * @return void
     */
    private function updatesSubGroups(): void
    {
        $this->inputs = array_map(function($group) {
            if ($group instanceof static) {
                $group->name = "{$group->parent_group->name}[{$group->name}]";

                if (count(Arr::first($group->inputs)->getValue() ?? []) > 0) {
                    $group->inputs = array_map(function($row) use ($group) {
                        return array_map(function($i) use ($row) {
                            $x = clone $i;
                            $x->value($row[$i->name] ?? null);
                            return $x;
                        }, $group->inputs);
                    }, $group->getValue());
                } else {
                    $group->inputs = [$group->inputs];
                }
            }

            return $group;
        }, $this->inputs);
    }

    /**
     * Get payload/inputs values for group
     *
     * @return array|string|null
     */
    public function getValue(string $key = null): array|string|null
    {
        if (!is_null($this->parent_group)) {
            $name = str_replace([$this->parent_group->name."[", "]"], "", $this->name);
            $query = $this->parent_group->palette->query->where('group', $this->parent_group->name)->where('name', $name);
        } else {
            $query = $this->palette->query->where('group', $this->group->name);
        }

        $payload = optional($query->first())->payload;

        if (!is_null($this->parent_group) && empty($payload)) {
            $payload = array_fill(0, count($this->inputs), null);
        }

        if ($key) {
            return array_reduce(explode(".", $key), fn($c, $k) => $c[$k] ?? null, $payload);
        }

        return $payload;
    }
}
