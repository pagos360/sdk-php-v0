<?php

namespace Pagos360\Model;

/**
 * Represents a PaymentRequest
 *
 * @property string $description
 * @property string $externalReference
 * @property string $firstDueDate
 * @property float $firstTotal
 * @property string $secondDueDate
 * @property float $secondTotal
 * @property string $payerName
 * @property string $payerEmail
 * @property string $backUrlSuccess
 * @property string $backUrlPending
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

    /**
     * Get the firstDueDate
     *
     * @return string
     */
    public function getFirstDueDate()
    {
        return $this->firstDueDate;
    }

    /**
     * Set the firstDueDate
     *
     * @param string $firstDueDate
     *
     * @return PaymentRequest
     */
    public function setFirstDueDate($firstDueDate)
    {
        $this->firstDueDate = $firstDueDate;

        return $this;
    }

    /**
     * Get the firstTotal
     *
     * @return float
     */
    public function getFirstTotal()
    {
        return $this->firstTotal;
    }

    /**
     * Set the firstTotal
     *
     * @param float $firstTotal
     *
     * @return PaymentRequest
     */
    public function setFirstTotal($firstTotal)
    {
        $this->firstTotal = $firstTotal;

        return $this;
    }

    /**
     * Get the secondDueDate
     *
     * @return string
     */
    public function getSecondDueDate()
    {
        return $this->secondDueDate;
    }

    /**
     * Set the secondDueDate
     *
     * @param string $secondDueDate
     *
     * @return PaymentRequest
     */
    public function setSecondDueDate($secondDueDate)
    {
        $this->secondDueDate = $secondDueDate;

        return $this;
    }

    /**
     * Get the secondTotal
     *
     * @return float
     */
    public function getSecondTotal()
    {
        return $this->secondTotal;
    }

    /**
     * Set the secondTotal
     *
     * @param float $secondTotal
     *
     * @return PaymentRequest
     */
    public function setSecondTotal($secondTotal)
    {
        $this->secondTotal = $secondTotal;

        return $this;
    }

    /**
     * Get the payerName
     *
     * @return string
     */
    public function getPayerName()
    {
        return $this->payerName;
    }

    /**
     * Set the payerName
     *
     * @param string $payerName
     *
     * @return PaymentRequest
     */
    public function setPayerName($payerName)
    {
        $this->payerName = $payerName;

        return $this;
    }

    /**
     * Get the payerEmail
     *
     * @return string
     */
    public function getPayerEmail()
    {
        return $this->payerEmail;
    }

    /**
     * Set the payerEmail
     *
     * @param string $payerEmail
     *
     * @return PaymentRequest
     */
    public function setPayerEmail($payerEmail)
    {
        $this->payerEmail = $payerEmail;

        return $this;
    }

    /**
     * Get the backUrlSuccess
     *
     * @return string
     */
    public function getBackUrlSucess()
    {
        return $this->backUrlSuccess;
    }

    /**
     * Set the backUrlSuccess
     *
     * @param string $backUrlSuccess
     *
     * @return PaymentRequest
     */
    public function setBackUrlSucess($backUrlSuccess)
    {
        $this->backUrlSuccess = $backUrlSuccess;

        return $this;
    }

    /**
     * Get the backUrlPending
     *
     * @return string
     */
    public function getBackUrlPending()
    {
        return $this->backUrlPending;
    }

    /**
     * Set the backUrlPending
     *
     * @param string $backUrlPending
     *
     * @return PaymentRequest
     */
    public function setBackUrlPending($backUrlPending)
    {
        $this->backUrlPending = $backUrlPending;

        return $this;
    }
}
