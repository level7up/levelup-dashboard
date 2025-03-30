<?php

namespace Level7up\Dashboard\Palette\Concerns;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Level7up\Dashboard\Palette\Group;
use Illuminate\Support\Facades\Storage;
use Level7up\Dashboard\Exceptions\PalettePropertyDoesNotExist;

trait InteractWithFields
{
    use ValidateFields;

    public function update(array $inputs): bool
    {
        $inputs = Arr::dot($this->validate($inputs));

        DB::beginTransaction();

        $this->updateSingleEntities($inputs);

        $this->updateMultipleEntities(
            array_filter($inputs, fn ($i) => substr_count($i, ".") > 1, ARRAY_FILTER_USE_KEY)
        );

        DB::commit();

        $this->instance()->clearCache();

        return true;
    }

    private function updateSingleEntities(array $inputs): void
    {
        foreach ($inputs as $key => $value) {
            if (count(explode(".", $key)) > 3) {
                continue;
            }

            $data = $this->getDataForSingleEntity($key, $value);

            if (!is_array($data)) {
                continue;
            }

            throw_unless(isset($data['setting']), PalettePropertyDoesNotExist::class, $data);

            $data['setting']->update([
                'payload' => $data['payload'],
                'locked' => $data['locked'],
            ]);
        }
    }

    private function getDataForSingleEntity(string $key, $value)
    {
        $column = preg_replace('/‎\w+‎/', "", $key);
        preg_match('/‎\w+‎/', $key, $class);
        $type = str_replace("‎", "", strtolower($class[0]));
        $group = explode(".", $column);
        $name = array_pop($group);
        $input = $this->instance()->find($column);
        switch ($type) {
            case 'image':
                if (Str::is("*.*_remove", $column) && $value == 1) {
                    $setting = $this->instance()->query->where("group", implode(".", $group))->where('name', str_replace("_remove", "", $name))->first();
                    optional($input)->remove($setting);
                    $value = null;
                } elseif ($value instanceof UploadedFile) {
                    $setting = $this->instance()->query->where("group", implode(".", $group))->where('name', $name)->first();
                    $value = $input->upload($value, $setting);
                } else {
                    return null;
                }
                break;

            case 'json':
                $index = $name;
                $name = array_pop($group);
                $setting = $this->instance()->query->where("group", implode(".", $group))->where('name', $name)->first();
                $tmp = $setting->payload;
                $tmp[$index] = $value;
                $value = $tmp;
                break;
            case 'file':
                $setting = $this->instance()->query->where("group", implode(".", $group))->where('name', $name)->first();
                $value = $input->upload($value, $setting);
                // "settings/Ie9TTmmlUMVKaGe44TXyUMVbweEPyvnl92tOzMJr"
                break;
            default:
                $setting = $this->instance()->query->where("group", implode(".", $group))->where('name', $name)->first();
                try {
                    if ($input->translated) {
                        $tmp = $setting->payload;
                        $tmp[$this->instance()->language] = $value;
                        $value = $tmp;
                    }
                } catch (\Throwable $th) {
                   dd( implode(".", $group), $name);
                }

                break;
        }

        return [
            'palette' => get_class($this->instance()),
            'group' => implode(".", $group),
            'name' => $name,
            'payload' => $value,
            'locked' => false,
            'setting' => $setting,
        ];
    }

    private function updateMultipleEntities(array $inputs): void
    {
        foreach (Arr::undot($inputs) as $key => $value) {
            foreach ($value as $sub_group_key => $sub_group_values) {
                $data = $this->getDataForMultipleEntity($key, $sub_group_key, $sub_group_values);

                $data['setting']->update([
                    'payload' => $data['payload'],
                    'locked' => $data['locked'],
                ]);
            }
        }
    }

    private function getDataForMultipleEntity(string $group, string $key, array $values)
    {
        $sub_group = $this->instance()->find("{$group}.{$key}");
        $setting = $this->instance()->query->where("group", $group)->where('name', $sub_group->name)->first();
        // $values = $this->removeExtraStringsFromKeys($values);

        $values = $this->prepareInputsForMultipleEntities($sub_group, Arr::dot($values));

        return [
            'palette' => get_class($this->instance()),
            'group' => $group,
            'name' => $sub_group->name,
            'payload' => $values,
            'locked' => false,
            'setting' => $setting,
        ];
    }

    /**
     * @deprecated @next
     */
    private function removeExtraStringsFromKeys(array $values): array
    {
        return $values;
        // you might need to store them with there types
        return array_combine(
            array_map(fn ($v) => preg_replace('/‎\w+‎/', "", $v), array_keys($values)),
            $values
        );
    }

    private function prepareInputsForMultipleEntities(Group $sub_group, array $values): array
    {
        foreach ($values as $key => $value) {
            $input = optional($sub_group->find(Arr::last(explode("‎", $key))));

            if ($value instanceof UploadedFile) {
                $values[$key] = upload($value, "settings");
            }

            if (Str::is("*.*_remove", $key) && $value == true) {
                Storage::disk('public')->delete(
                    Arr::get($sub_group->getValue(), str_replace("_remove", "", $key))
                );
            }

            if (Str::is("*.*_old", $key) && !isset($values[str_replace("_old", "", $key)]) && $values[str_replace("_old", "_remove", $key)] != true) {
                $values[str_replace("_old", "", $key)] = str_replace(Storage::disk('public')->url(""), "", $value);
            }

            if ($input->translated) {
                $values[$key] = Arr::wrap($sub_group->getValue($key));
                $values[$key][$this->instance()->language] = $value;
            }
        }

        return Arr::undot(
            array_filter($values, fn ($k) => !Str::is(["*.*_remove", "*.*_old"], $k), ARRAY_FILTER_USE_KEY)
        );
    }
}
