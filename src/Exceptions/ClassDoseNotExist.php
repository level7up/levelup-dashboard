<?php

namespace Level7up\Dashboard\Exceptions;

use Exception;
use Throwable;

class ClassDoseNotExist extends Exception
{
    public function __construct($message = [], int $code = 0, ?Throwable $previous = null)
    {
        $this->message = "Looked in following order:\n";

        foreach ($message as $class => $result) {
            $this->message .= json_encode([$class, $result])."\n";
        }
    }
}
