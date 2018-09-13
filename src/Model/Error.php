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
    private $field;

    /**
     * @var array
     */
    private $errors;

    /**
     * Creates a instance of Error
     *
     * @param string $field
     * @param array $error
     */
    public function __construct($field, array $error)
    {
        $this->field = $field;
        $this->errors = $error;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
