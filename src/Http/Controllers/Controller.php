<?php

namespace Level7up\Dashboard\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successRedirect(string $route, string $title = null, array $additional_route = [])
    {
        if (!$title && isset(debug_backtrace()[1]) && isset(debug_backtrace()[1]['class'])) {
            $key = sprintf(
                "dashboard::site.%s.%s",
                debug_backtrace()[1]['class'],
                debug_backtrace()[1]['function']
            );

            $title = trans()->has($key) ? trans($key) : trans("dashboard::site.".debug_backtrace()[1]['function']);
        }

        return redirect()
            ->route($route, $additional_route)
            ->with('success', $title);
    }

    public function errorRedirect(string $route, string $title)
    {
        return redirect()
            ->route($route)
            ->with('error', $title);
    }
}
