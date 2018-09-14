<?php

namespace Pagos360;

use Pagos360\Exception\Pagos360UnauthorizedException;
use Pagos360\Util\ApiClient;
use Pagos360\Model\PaymentRequest;
use Pagos360\Exception\Pagos360BadRequestException;
use Pagos360\Exception\Pagos360ArgumentException;
use Pagos360\Exception\Pagos360NotFoundException;

/**
 * The Pagos360 SDK Client
 *
 * @package Pagos360
 */
class Pagos360
{
    /**
     * The internal API client
     *
     * @var ApiClient
     */
    private $client;

    /**
     * Creates a instance of the SDK Client
     *
     * @param string $apiKey The API KEY
     * @param string $server The API server to connect to
     *
     * @throws Pagos360ArgumentException
     */
    public function __construct($apiKey, $server = 'https://qa.api.pagos360.com')
    {
        if (empty($apiKey)) {
            throw new Pagos360ArgumentException(
                'You need to specify your API KEY'
            );
        }

        $this->client = new ApiClient($apiKey, $server);
    }

    /**
     * Create a Payment Request
     *
     * @param PaymentRequest $paymentRequest
     *
     * @return PaymentRequest
     *
     * @throws Pagos360BadRequestException
     * @throws Pagos360UnauthorizedException
     * @throws Pagos360NotFoundException
     */
    public function createPaymentRequest(PaymentRequest $paymentRequest)
    {
        $body = $this->client->doPost(
            '/payment-request',
            array(),
            $paymentRequest,
            array()
        );

        return new PaymentRequest($body);
    }

    /**
     * Retrieve a Payment Request by id.
     *
     * @param int $id
     *
     * @return PaymentRequest
     *
     * @throws Pagos360BadRequestException
     * @throws Pagos360UnauthorizedException
     * @throws Pagos360NotFoundException
     */
    public function retrievePaymentRequest($id)
    {
        $body = $this->client->doGet(
            '/payment-request/{id}',
            array('id' => $id),
            array()
        );

        return new PaymentRequest($body);
    }
}
