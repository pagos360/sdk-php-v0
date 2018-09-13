<?php

namespace Pagos360\Model;

/**
 * Class Error
 *
 * @package Pagos360\Model
 */
class Error
{
    /**
     * @var string
     */
    private $error;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $errorDescription;

    /**
     * Creates a instance of Error
     *
     * @param array $error A single errors response map
     */
    public function __construct(array $error)
    {

//        $this->errors = $errors['errors'];
//        $this->errorDescription = $errors['error_description'];

        if (isset($error['message'])) {
            $this->message = $error['message'];
        }
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getErrorDescription()
    {
        return $this->errorDescription;
    }
}
