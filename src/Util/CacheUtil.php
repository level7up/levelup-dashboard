<?php

namespace Level7up\Dashboard\Util;

use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CacheUtil
{
    private ?string $store;

    /** @var \DateTimeInterface|\DateInterval|int|null */
    private $ttl;

    function __construct(string $store = null)
    {
        $this->store = $store;
    }

    public function has(string $key): bool
    {
        return Cache::store($this->store)->has($this->resolveCacheKey($key));
    }

    public function get(string $key)
    {
        return unserialize(
            Cache::store($this->store)->get($this->resolveCacheKey($key))
        );
    }

    public function put($class)
    {
        Cache::store($this->store)->put(
            $this->resolveCacheKey(get_class($class)),
            serialize($class),
            $this->ttl
        );

        return $class;
    }

    public function either(string $key, Closure $cb)
    {
        if ($this->has($key)) {
            return $this->get($key);
        }

        return $this->put(
            $cb($key)
        );
    }

    public function clear(string $key = null): void
    {
        if ($key) {
            Cache::store($this->store)->delete(
                $this->resolveCacheKey($key)
            );
        } else {
            Cache::store($this->store)->clear();
        }
    }

    private function resolveCacheKey(string $settingsClass): string
    {
        return "hash_support.{$settingsClass}";
    }
}
