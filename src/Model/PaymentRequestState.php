<?php

namespace Pagos360\Model;

/**
 * Represents a PaymentRequestState
 *
 * @property string $name
 *
 * @package Pagos360\Model
 */
class PaymentRequestState extends BaseModel
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
     * Creates a instance of payment request state
     *
     * @param string[] $properties The default properties
     */
    public function __construct(array $properties = array())
    {
        parent::__construct(
            'payment_request_state',
            self::$READ_ONLY_FIELDS,
            $properties
        );
    }

    /**
     * Get the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name
     *
     * @param string $name
     *
     * @return PaymentRequestState
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
