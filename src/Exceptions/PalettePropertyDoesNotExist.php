<?php

namespace Level7up\Dashboard\Exceptions;

use Exception;
use Throwable;

class PalettePropertyDoesNotExist extends Exception
{
    public function __construct($data, $code = 0, Throwable $previous = null) {
        $message = "Property {$data['name']} doesn't exists for palette: {$data['palette']} and group: {$data['group']}";

        parent::__construct($message, $code, $previous);
    }
}
