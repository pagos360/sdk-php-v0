<?php

namespace Pagos360\Util;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\UriTemplate;
use Pagos360\Exception\Pagos360ApiException;
use Pagos360\Model\BaseModel;
use Pagos360\Response\ErrorResponse;

/**
 * Class ApiClient
 *
 * @package Pagos360\Util
 */
class ApiClient
{
    /**
     * The SDK version number
     *
     * @var string
     */
    const VERSION = '0.1.0';

    /**
     * The Guzzle http client
     *
     * @var Client
     */
    private $client;

    /**
     * Creates a instance of the API client
     *
     * @param string $apiKey The API KEY
     * @param string $server The API server to connect to
     * @param array $clientOptions Guzzle Client Options
     */
    public function __construct($apiKey, $server, $clientOptions = array())
    {
        // Setup http client if not specified
        $this->client = new Client(array_merge_recursive(array(
            'base_uri' => $server,
            'headers' => array(
                'User-Agent' => 'Pagos360 PHP SDK v' . self::VERSION,
                'Accept' => 'application/json',
                'Authorization' => sprintf('Bearer %s', $apiKey)
            )
        ), $clientOptions));
    }

    /**
     * Do a POST call to the Pagos360 API server
     *
     * @param string $partialUrl The url template
     * @param array $uriParams The url template parameters
     * @param BaseModel $data The data to submit
     * @param array $query Query parameters
     * @param array $headers Additional headers
     *
     * @return array
     *
     * @throws Pagos360ApiException
     */
    public function doPost(
        $partialUrl,
        array $uriParams,
        BaseModel $data = null,
        array $query = array(),
        array $headers = array()
    ) {
        return $this->doRequest('POST', $partialUrl, $uriParams, array(
            'query' => $query,
            'body' => $data ? \GuzzleHttp\json_encode($data->getPropertiesForCreate(), JSON_FORCE_OBJECT) : '{}',
            'headers' => array_merge($headers, array(
                'Content-Type' => 'application/json'
            ))
        ));
    }

    /**
     * Do a PUT call to the Pagos360 API server
     *
     * @param string $partialUrl The url template
     * @param array $uriParams The url template parameters
     * @param BaseModel $data The data to update
     * @param array $query Query parameters
     * @return array
     *
     * @throws Pagos360ApiException
     */
    public function doPut($partialUrl, array $uriParams, BaseModel $data, array $query)
    {
        return $this->doRequest('PUT', $partialUrl, $uriParams, array(
            'query' => $query,
            'body' => \GuzzleHttp\json_encode($data->getPropertiesForUpdate(), JSON_FORCE_OBJECT),
            'headers' => array(
                'Content-Type' => 'application/json'
            )
        ));
    }

    /**
     * Do a GET call to the Pagos360 API server
     *
     * @param string $partialUrl The url template
     * @param array $uriParams The url template parameters
     * @param array $query Query parameters
     * @return array
     *
     * @throws Pagos360ApiException
     */
    public function doGet($partialUrl, array $uriParams, array $query)
    {
        return $this->doRequest('GET', $partialUrl, $uriParams, array(
            'query' => $query
        ));
    }

    /**
     * Execute API call and map error messages
     *
     * @param string $method The http method
     * @param string $url The url template
     * @param array $urlParams The url template parameters
     * @param array $options The request options
     *
     * @return array
     *
     * @throws Pagos360ApiException
     */
    private function doRequest($method, $url, array $urlParams, array $options)
    {
        try {
            $uri = new UriTemplate();
            $response = $this->client->request($method, $uri->expand($url, $urlParams), $options);
            if ($response->getStatusCode() === 204) {
                return array();
            }
            $body = \GuzzleHttp\json_decode($response->getBody(), true);
            if (isset($body['links'])) {
                unset($body['links']);
            }
            return $body;
        } catch (ConnectException $e) {
            $errorResponse = new ErrorResponse(0, array('errors' => array(
                array(
                    'message' => 'Could not communicate with ' . $this->client->getConfig('base_uri'),
                    'code' => 'COMMUNICATION_ERROR'
                )
            )));
            throw new Pagos360ApiException($errorResponse, $e);
        } catch (BadResponseException $e) {
            $body = \GuzzleHttp\json_decode($e->getResponse()->getBody(), true);
            $errorResponse = new ErrorResponse($e->getResponse()->getStatusCode(), $body);
            throw new Pagos360ApiException($errorResponse, $e);
        }
    }
}
