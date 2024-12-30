<?php

namespace Level7up\Dashboard\UI\Palettes;

use Level7up\Dashboard\Palette\Group;
use Level7up\Dashboard\Palette\Palette;
use Level7up\Dashboard\Palette\Inputs\Text;
use Level7up\Dashboard\Palette\Inputs\Textarea;



class General extends Palette
{
    public $translation_key = "dashboard::palettes.general.title";

    public $icon = 'phosphor-piano-keys-duotone';

    public function general(): Group
    {
        return Group::make([
            Text::make('site_name')
                ->label(trans('dashboard::palettes.general.general.inputs.site_name'))
                ->rules('required|string'),
            Text::make('email')
                ->label(trans('auth::keywords.email'))
                ->rules('required|email'),
            Text::make('phone')
                ->label(trans('auth::keywords.phone'))
                ->rules('required'),
            Textarea::make('site_description')
                ->label(trans('dashboard::palettes.general.general.inputs.site_description'))
                ->rules('required|string')
                ->translated(),
            Textarea::make('address')
                ->label(trans('auth::keywords.address'))
                ->rules('required|string')
                ->translated(),
            Textarea::make('slogan')
                ->label(trans('dashboard::palettes.general.general.inputs.slogan'))
                ->rules('required|string')
                ->translated(),
            Text::make('copyrights')
                ->label(trans('auth::keywords.copyright'))
                ->rules('required|string')
                ->translated(),
        ])->label(trans("dashboard::palettes.general.general.title"));
    }
}
