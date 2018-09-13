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
     * @var string
     */
    private $error;

    /**
     * Creates a instance of Error
     *
     * @param string $field
     * @param string $error
     */
    public function __construct($field, $error)
    {
        $this->field = $field;
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
}
