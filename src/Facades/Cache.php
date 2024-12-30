<?php
namespace Level7up\Dashboard\Facades;


use Illuminate\Support\Facades\Facade;

class Cache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return self::class;
    }
}
