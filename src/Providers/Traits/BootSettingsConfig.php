<?php

namespace Level7up\Dashboard\Providers\Traits;

trait BootSettingsConfig
{
    public function bootSettingsConfig()
    {
        config([
            'app.name' => setting('general', 'general.site_name', config('app.name')),
        ]);
    }
}
