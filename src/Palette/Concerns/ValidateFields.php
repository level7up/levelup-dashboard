<?php

namespace Level7up\Dashboard\Palette\Concerns;

use Level7up\Dashboard\Palette\Group;
use Level7up\Dashboard\Palette\Inputs\Image;
use Illuminate\Support\Facades\Validator;

trait ValidateFields
{
    private function validate(array $inputs): array
    {
        return Validator::make(
            $inputs,
            $this->getPaletteRules()
        )->validate();
    }

    private function getPaletteRules(): array
    {
        return array_filter(array_reduce(
            $this->instance()->groups, [$this, 'getPaletteGroupRules'], []
        ));
    }

    private function getPaletteGroupRules(array $carry, Group $group)
    {
        return array_reduce(
            $group->inputs, fn($c, $i) => $this->getPalletteGroupInputRules($c, $group, $i), $carry
        );
    }

    private function getPalletteGroupInputRules(array $carry, Group $group, $input)
    {
        if ($input instanceof Group) {
            return $this->getPaletteGroupRules($carry, $input);
        }

        $input_name = $input->name;

        if ($group->parent_group) {
            $input_name = "*.{$input_name}";
        }

        switch (get_class($input)) {
            case Image::class:
                $parent_group_name = $group->parent_group ? "{$group->parent_group->name}." : "";
                $carry["$parent_group_name$group->name.$input_name"] = $input->rules;
                $carry["{$parent_group_name}{$group->name}.{$input_name}_remove"] = "sometimes|nullable|boolean";
                $carry["{$parent_group_name}{$group->name}.{$input_name}_old"] = "sometimes|nullable|string";
                break;

            default:
                $parent_group_name = $group->parent_group ? "{$group->parent_group->name}." : "";
                $carry["$parent_group_name$group->name.$input_name"] = $input->rules;
                break;
        }

        return $carry;
    }
}
