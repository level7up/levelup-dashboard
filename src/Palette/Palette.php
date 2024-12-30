<?php

namespace Level7up\Dashboard\Palette;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Level7up\Dashboard\Exceptions\PaletteGroupNotFound;

abstract class Palette
{
    public string $menu = 'general';

    /** @var array */
    protected $groups;

    /** @var string */
    public $name;

    /** @var \Illuminate\Database\Eloquent\Collection<\Level7up\Dashboard\Models\Settings> */
    public $query;

    public function __get($name)
    {
        if ($name == 'groups') {
            return $this->getGroups();
        }

        return null;
    }

    private function getGroups(): array
    {
        return array_map(function ($group) {
            $group = call_user_func([$this, $group]);
            $group->palette = $this;

            return $group;
        }, $this->getValidGroups());
    }

    private function getValidGroups(): array
    {
        return array_filter(
            get_class_methods($this),
            fn ($g) => ! in_array($g, get_class_methods(self::class)),
        );
    }

    public function find(string $key)
    {
        $exploded = explode('.', $key);

        if (! $group = Arr::first($this->getGroups(), fn ($g) => $g->name == $exploded[0])) {
            throw new PaletteGroupNotFound();
        }

        if (count($exploded) < 2) {
            return $group;
        }

        return $group->find(str_replace("{$exploded[0]}.", '', $key));
    }

    public function clearCache()
    {
        return Cache::clear(get_class($this));
    }
}
