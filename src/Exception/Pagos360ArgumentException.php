<?php

namespace Pagos360\Exception;

/**
 * The Pagos360 exception for missing arguments
 *
 * @package Pagos360\Exception
 */
class Pagos360ArgumentException extends Pagos360Exception
{
    /**
     * Creates a instance of the Pagos360ArgumentException
     *
     * @param string $message The errors errorDescription
     * @param int|null $code The errors code
     * @param \Exception|null $previous The original exception
     */
    public function __construct(
        $message,
        $code = null,
        \Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

}
