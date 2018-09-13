<?php

namespace Pagos360\Exception;

use Pagos360\Response\ErrorResponse;

/**
 * The Pagos360 exception for api errors
 *
 * @package Pagos360\Exception
 */
class Pagos360ApiException extends Pagos360Exception
{
    /**
     * The error response
     *
     * @var ErrorResponse
     */
    private $errorResponse;

    /**
     * Creates a instance of the Pagos360ArgumentException
     *
     * @param ErrorResponse $errorResponse The error response
     * @param \Exception|null $previous The original exception
     */
    public function __construct(
        ErrorResponse $errorResponse,
        \Exception $previous
    ) {
        parent::__construct($errorResponse[0]->getMessage(), null, $previous);

        $this->errorResponse = $errorResponse;
    }

    /**
     * The error response or null if not available
     *
     * @return ErrorResponse
     */
    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
