<?php

namespace Level7up\Dashboard\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Level7up\Dashboard\Models\Setting;
use Level7up\Dashboard\Facades\Palette;
use Level7up\Dashboard\Http\Controllers\Controller;

class PaletteController extends Controller
{
    public function show(string $menu, string $palette, string $lang = null)
    {
        // $this->authorize('view', Setting::class);
        try {
            $palette = Palette::make($palette)
                ->language($lang);
                $palette->instance()
                ->clearCache();

            return $palette->render();
        } catch (Exception $ex) {
        throw $ex;
            logger($ex);
        }

        return abort(404);
    }

    public function store(Request $request, string $menu, string $palette, string $lang = null)
    {
        // $this->authorize('update', Setting::class);

        Palette::make($palette)
            ->language($lang)
            ->update($request->all());

        return redirect()
            ->route('dashboard.ui.palette.show', [$menu, $palette, $lang])
            ->with('success', trans('metronic::messages.updated', ['model' => trans('Setting')]));
    }
}
