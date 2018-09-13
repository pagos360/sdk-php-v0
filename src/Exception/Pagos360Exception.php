<?php

namespace Pagos360\Exception;

/**
 * The base exception for Pagos360 SDK errors
 *
 * @package Pagos360\Exception
 */
class Pagos360Exception extends \Exception
{
    /**
     * Creates a instance of the Pagos360Exception
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
