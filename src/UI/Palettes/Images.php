<?php

namespace Level7up\Dashboard\UI\Palettes;

use Level7up\Dashboard\Palette\Group;
use Level7up\Dashboard\Palette\Palette;
use Level7up\Dashboard\Palette\Inputs\Image;



class Images extends Palette
{
    public string $menu = 'logo';

    /** @var string */
    public $translation_key = "dashboard::palettes.images.title";

    /** @var string */
    public $icon = 'duotune-general-006';

    public function logo(): Group
    {
        return Group::make([
            Image::make()
                ->label(trans('dashboard::palettes.images.images.inputs.default'))
                ->name('default')
                ->rules('sometimes|nullable'),
            Image::make()
                ->label(trans('dashboard::palettes.images.images.inputs.default-dark'))
                ->name('default_dark')
                ->rules('sometimes|nullable'),
            Image::make()
                ->label(trans('dashboard::palettes.images.images.inputs.favicon'))
                ->name('favicon')
                ->rules('sometimes|nullable'),
            Image::make()
                ->label(trans('dashboard::palettes.images.images.inputs.favicon-dark'))
                ->name('favicon_dark')
                ->rules('sometimes|nullable'),
            Image::make()
                ->label(trans('dashboard::palettes.images.images.inputs.square'))
                ->name('square')
                ->rules('sometimes|nullable'),
            Image::make()
                ->label(trans('dashboard::palettes.images.images.inputs.square-dark'))
                ->name('square_dark')
                ->rules('sometimes|nullable'),
        ])->label("Website's logo");
    }
}
