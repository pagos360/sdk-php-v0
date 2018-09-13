<?php

namespace Pagos360\Exception;

use Pagos360\Response\ErrorResponse;

/**
 * The Pagos360 exception for api errors
 *
 * @package Pagos360\Exception
 */
class Pagos360BadRequestException extends Pagos360Exception
{
    /**
     * The errors response
     *
     * @var ErrorResponse
     */
    private $errorResponse;

    /**
     * Creates a instance of the Pagos360BadRequestException
     *
     * @param ErrorResponse $errorResponse
     * @param \Exception|null $previous
     */
    public function __construct(
        ErrorResponse $errorResponse,
        \Exception $previous
    ) {
        parent::__construct('Bad Request', null, $previous);

        $this->errorResponse = $errorResponse;
    }

    /**
     * The errors response or null if not available
     *
     * @return ErrorResponse
     */
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
