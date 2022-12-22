<?php

/**
 * Author: B Moss
 * Email: benmoss2002@fastmail.co.uk
 * Date: 22/12/22
 * 
 * @author B Moss
 */

declare (strict_types = 1);

namespace Phpocketbase;

use Exception;

class Rest
{
    private $client;
    private $error;
    private $result;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __destruct() {}

    public function getClient()
    {
        return $this->client;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getResult() : array
    {
        return $this->result;
    }

    public function list(string $collection)
    {
        $baseUri = $this->client->getBaseUri();

        $uri = $baseUri . 'collections/' . $collection . '/records';
        $options = [
            'headers' => $this->client->getHeaders()
        ];

        $this->result = $this->client->executeHttpRequest('GET', $uri, $options);
    }

    public function search()
    {

    }

    public function create(string $collection, array $data)
    {
        $baseUri = $this->client->getBaseUri();

        $uri = $baseUri . 'collections/' . $collection . '/records';
        $options = [
            'headers' => $this->client->getHeaders(),
            'form-params' => $data
        ];

        $this->result = $this->client->executeHttpRequest('POST', $uri, $options);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}