<?php

namespace Level7up\Dashboard\Palette\Migrations;

use Closure;
use Exception;
use Illuminate\Support\Str;
use Level7up\Dashboard\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration as Base;

abstract class Migration extends Base
{
    protected $palette;

    protected $ignoreDuplications = false;

    private $groups;

    abstract public function groups(): void;

    public function group(string $name, Closure $cb)
    {
        if (! $this->groups) {
            $this->groups = collect();
        }

        $this->groups->push($cb(new Group($name)));
    }

    public function up(): void
    {
        if (! Schema::hasTable('settings')) {
            return;
        }

        $this->groups();

        $seed = $this->groups->map(
            fn ($g) => $this->mapGroups($g)
        )->flatten(1)
        ->filter()
        ->toArray();

        Setting::insert($seed);
    }

    public function down(): void
    {
        if (! Schema::hasTable('settings')) {
            return;
        }

        $this->groups();

        $this->groups->each(function ($group) {
            $group->inputs
                ->merge($group->groups)
                ->each(function ($input) use ($group) {
                    $row = Setting::where([
                        'palette' => $this->palette, 'group' => $group->name, 'name' => $input['key'],
                    ])->select('id')->first();

                    if ($row) {
                        $row->delete();
                    }
                });
        });
    }

    protected function getPaletteName(): string
    {
        return app($this->palette)->name ?? Str::snake(class_basename($this->palette));
    }

    private function mapGroups(Group $group)
    {
        return $group->inputs->map(
            fn ($i) => $this->mapInputs($i, $group)
        )->merge($group->groups->map(
            fn ($i) => $this->mapSubGroups($i, $group)
        ));
    }

    private function mapInputs(array $input, Group $group): array|null
    {
        if (Setting::where([
            'palette' => $this->palette, 'group' => $group->name, 'name' => $input['key'],
        ])->exists()) {
            if ($this->ignoreDuplications) {
                return null;
            }

            throw new Exception("Property {$input['key']} already exists for palette: {$this->palette} and group: {$group->name}", 1);
        }

        return [
            'palette' => $this->palette,
            'group' => $group->name,
            'name' => $input['key'],
            'payload' => json_encode($input['value']),
            'locked' => false,
            'updated_at' => time(),
            'created_at' => time(),
        ];
    }

    private function mapSubGroups(array $subGroup, Group $group): array
    {
        return [
            'palette' => $this->palette,
            'group' => $group->name,
            'name' => $subGroup['key'],
            'payload' => json_encode([]),
            'locked' => false,
            'updated_at' => time(),
            'created_at' => time(),
        ];
    }
}
