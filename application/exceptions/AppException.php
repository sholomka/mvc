<?php

namespace Application\Exceptions;

class AppException extends \Exception
{
    public function __construct($message)
    {
        $this->message = $message;
    }
}