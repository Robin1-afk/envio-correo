<?php

namespace App\Application\Shared\Exceptions;

use Exception;
/**
 * Class ApplicationException
 * Custom exception for application-level errors.
 */
class ApplicationException extends Exception
{
    /**
     * ApplicationException constructor.
     *
     * @param string $message
     * @param int $code
     */
    public function __construct(string $message = "Error de aplicación", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}
