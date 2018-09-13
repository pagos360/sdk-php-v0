<?php

namespace Pagos360\Model;

/**
 * Represents a PaymentRequest
 *
 * @property string $description The payment token
 *
 * @package Pagos360\Model
 */
class PaymentRequest extends BaseModel
{
    /**
     * Get the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the description
     *
     * @param string $description
     *
     * @return PaymentRequest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
