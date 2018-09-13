<?php

namespace Pagos360\Exception;

/**
 * Class Pagos360InvalidApiKeyException
 *
 * @package Pagos360\Exception
 */
class Pagos360InvalidApiKeyException extends Pagos360Exception
{
    /**
     * Creates a instance of the Pagos360InvalidApiKeyException
     *
     * @param string $message The errors message
     * @param \Exception|null $previous The original exception
     */
    public function __construct(
        $message,
        \Exception $previous
    ) {
        parent::__construct($message, null, $previous);
    }
}
