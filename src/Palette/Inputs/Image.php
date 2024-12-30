<?php

namespace Level7up\Dashboard\Palette\Inputs;

use Level7up\Dashboard\Models\Setting;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Image extends Input
{
    public function html(): string
    {
        return view('dashboard::palettes.inputs.image', $this->all())->render();
    }

    private function valueMightBeSvg()
    {
        $value = parent::getValue();

        if (is_null($value) || is_array($value)) {
            return $value;
        }

        $path = Str::startsWith($value, '/assets')?
            public_path($value):
            Storage::disk('public')->path($value);

        if (file_exists($path)) {
            return $value;
        }

        return sprintf("%s/%s.svg", pathinfo($value, PATHINFO_DIRNAME), pathinfo($value, PATHINFO_FILENAME));
    }

    public function getValue()
    {
        $data = $this->valueMightBeSvg();

        if (is_null($data)) {
            return null;
        }

        if (is_array($data)) {
            return $data;
        }

        if (Str::startsWith($data, '/assets')) {
            return url($data);
        }

        return Storage::disk('public')->url($data);
    }

    public function getPath()
    {
        $data = $this->valueMightBeSvg();

        if (is_array($data)) {
            return public_path("/assets/dashboard/media/logos/256x256.svg");
        }

        if (Str::startsWith($data, '/assets')) {
            return public_path($data);
        }

        return Storage::disk('public')->path($data);
    }

    public function getBase64()
    {
        $logo = $this->getPath();

        if ($logo && file_exists($logo)) {
            return 'data:'.mime_type($logo).';base64, '.base64_encode(file_get_contents($logo));
        }

        return 'data:image/svg+xml;base64, '.base64_encode(file_get_contents(public_path('/assets/dashboard/media/logos/256x256.svg')));
    }

    public function upload(UploadedFile $file, Setting $setting): string
    {
        $this->remove($setting);

        return upload($file, "settings");
    }

    public function remove(Setting $setting): void
    {
        if (is_null($setting->payload)) {
            return;
        }

        Storage::disk('public')->delete($setting->payload);
    }
}
