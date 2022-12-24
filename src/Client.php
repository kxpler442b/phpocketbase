<?php

/**
 * /**
 * Author: B Moss
 * Email: benmoss2002@fastmail.co.uk
 * Date: 23/12/22
 * 
 * @author B Moss
 */

declare(strict_types=1);

namespace Phpocketbase;

use GuzzleHttp\Psr7\Response;

class Client
{
    private $pocketbase;
    private $httpClient;
    private $error;
    private $response;

    private $headers = [
        'Content-Type' => 'application/json'
    ];
    private $json = [];

    /**
     * Constructor method
     *
     * @param string $pocketbase
     */
    public function __construct(string $pocketbase)
    {
        $this->pocketbase = $pocketbase;
        $this->httpClient = new \GuzzleHttp\Client();
    }

    public function __destruct() {}

    /**
     * Returns the base url of the Pocketbase service used.
     *
     * @return string
     */
    public function getPocketbaseUri() : string
    {
        return $this->pocketbase;
    }

    /**
     * Returns the http client as an object
     *
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient() : \GuzzleHttp\Client
    {
        return $this->httpClient;
    }

    /**
     * Returns the http response as an array
     *
     * @return array
     */
    public function getResponse() : array
    {
        return $this->response;
    }

    public function getHeaders() : array
    {
        return $this->headers;
    }

    public function getJson() : string
    {
        return json_encode($this->json);
    }

    public function setJson(string $key, string $value) : void
    {
        $this->json[$key] = $value;
    }

    /**
     * Set the headers used in the http request
     *
     * @param string $header
     * @param string $value
     * @return void
     */
    public function setHeader(string $header, string $value) : void
    {
        $this->headers[$header] = $value;
    }

    /**
     * Set the Authorisation header for admin users
     *
     * @param string $token
     * @return void
     */
    public function setAuthHeader(string $token) : void
    {
        $this->setHeader('Authorisation', $token);
    }

    /**
     * Instantiates a new AuthService object
     *
     * @return object
     */
    public function getAuthService() : object
    {
        return new \Phpocketbase\Services\AuthService($this);
    }

    /**
     * Instantiates a new CrudService object
     *
     * @return object
     */
    public function getCrudService() : object
    {
        return new \Phpocketbase\Services\CrudService($this);
    }

    public function getRequestBuilder() : object
    {
        return new \Phpocketbase\Utils\RequestBuilder($this);
    }

    /**
     * Execute a HTTP request using the given paramaters produced by RequestBuilder
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @return array
     */
    public function executeHttpRequest(string $method, string $url, array $options) : array
    {
        try {
            $this->response = $this->httpClient->request($method, $url, $options);
            return json_decode((string) $this->response->getBody());
        } catch(\GuzzleHttp\Exception\RequestException $error) {
            throw $error;
        } catch(\GuzzleHttp\Exception\ConnectException $error) {
            throw $error;
        }
    }
}