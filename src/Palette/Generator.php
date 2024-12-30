<?php

namespace Level7up\Dashboard\Palette;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Level7up\Dashboard\Facades\Cache;
use Level7up\Dashboard\Palette\Concerns;
use Symfony\Component\Finder\SplFileInfo;

class Generator
{
    use Concerns\InteractWithFields;

    /** @var string */
    protected $palette;

    /** @var string */
    protected $language;

    public function language(string $language = null): self
    {
        $this->language = $language;

        return $this;
    }

    public function make(string $palette): self
    {
        $this->palette = Str::studly($palette);

        return $this;
    }

    public function of(Palette $palette): self
    {
        $this->palette = $palette;

        return $this;
    }

    public function list(): array
    {
        return array_map([$this, 'renderClass'], File::files(app_path('UI/Palettes')));
    }

    public function render(): View
    {
        $list = array_values(
            array_filter($this->list(),
                fn ($item) => $item->menu == request()->route('menu')
            ));
        $palette = Arr::first($list, fn ($item) => class_basename($item) == $this->palette);
        return view('dashboard::palettes.show', compact('palette', 'list'));
    }

    public function instance(): Palette
    {
        if ($this->palette instanceof Palette) {
            return $this->callAfterResolvingClass($this->palette);
        }

        return $this->getPaletteInstanceByPaletteName();
    }

    private function renderClass(SplFileInfo $file): Palette
    {
        $class = app(str_replace(
            [app_path(), '.php', '/'],
            ['App', '', '\\'],
            $file->getPathname()
        ));

        $this->callAfterResolvingClass($class);

        return $class;
    }

    private function getPaletteInstanceByPaletteName(): Palette
    {
        return tap(
            app(Str::studly("App\UI\Palettes\\{$this->palette}")),
            fn ($p) => $this->callAfterResolvingClass($p)
        );
    }

    private function callAfterResolvingClass(Palette $class): Palette
    {
        if ($class->translation_key) {
            $class->title = trans($class->translation_key);
        }

        if (is_null($class->title)) {
            $class->title = $this->palette;
        }

        $class->name = Str::snake(class_basename($class));

        $class->language = get_lang($this->language);

        $class->query = Cache::either(get_class($class),
            fn ($name) => tap($class, fn ($c) => $c->query = app(get_model('Setting'))->palette($name)->get())
        )->query;

        return $class;
    }
}
