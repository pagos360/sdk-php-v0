<?php

namespace Pagos360\Exception;

/**
 * Class Pagos360NotFoundException
 *
 * @package Pagos360\Exception
 */
class Pagos360NotFoundException extends Pagos360Exception
{
    /**
     * Creates a instance of the Pagos360UnauthorizedException
     *
     * @param \Exception|null $previous The original exception
     */
    public function __construct(\Exception $previous)
    {
        parent::__construct('Not Fund', null, $previous);
    }
}
