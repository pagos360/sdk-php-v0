<?php

namespace Pagos360\Exception;

/**
 * Class Pagos360UnauthorizedException
 *
 * @package Pagos360\Exception
 */
class Pagos360UnauthorizedException extends Pagos360Exception
{
    /**
     * Creates a instance of the Pagos360UnauthorizedException
     *
     * @param \Exception|null $previous The original exception
     */
    public function __construct(\Exception $previous)
    {
        parent::__construct('Unauthorized', null, $previous);
    }
}
