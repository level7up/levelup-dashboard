<?php

namespace Level7up\Dashboard\Palette\Inputs;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Level7up\Dashboard\Models\Setting;
use Illuminate\Support\Facades\Storage;

class File extends Input
{
    public function html(): string
    {
        return view('dashboard::palettes.inputs.file', $this->all())->render();
    }

    public function getValue()
    {
        $data = parent::getValue();
        if (is_null($data)) {
            return null;
        }

        if (is_array($data)) {
            return $data;
        }

        if (Str::startsWith($data, '/assets')) {
            return url($data);
        }
        return Storage::disk('local')->url($data);
    }

    // public function getPath()
    // {
    //     $data = $this->valueMightBeSvg();

    //     if (is_array($data)) {
    //         return public_path("/assets/dashboard/media/logos/256x256.svg");
    //     }

    //     if (Str::startsWith($data, '/assets')) {
    //         return public_path($data);
    //     }

    //     return Storage::disk('public')->path($data);
    // }


    public function upload(UploadedFile $file, Setting $setting): string
    {
        $this->remove($setting);
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('settings/files', $fileName, 'public');
        return $filePath;
    }

    public function remove(Setting $setting): void
    {
        if (is_null($setting->payload)) {
            return;
        }

        Storage::disk('public')->delete($setting->payload);
    }
}
