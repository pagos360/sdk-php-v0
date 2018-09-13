<?php

namespace Pagos360\Model;

/**
 * Represents a PaymentRequest
 *
 * @property string $description The payment token
 * @property string $externalReference
 *
 * @package Pagos360\Model
 */
class PaymentRequest extends BaseModel
{
    /**
     * @internal
     *
     * Read only fields
     *
     * @var string[]
     */
    private static $READ_ONLY_FIELDS = array('id');

    /**
     * Creates a instance of Payment
     *
     * @param string[] $properties The default properties
     */
    public function __construct(array $properties = array())
    {
        parent::__construct(
            'payment_request',
            self::$READ_ONLY_FIELDS,
            $properties
        );
    }

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

    /**
     * Get the externalReference
     *
     * @return string
     */
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    /**
     * Set the externalReference
     *
     * @param string $externalReference
     *
     * @return PaymentRequest
     */
    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;

        return $this;
    }
}
