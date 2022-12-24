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

namespace Phpocketbase\Services;

use Phpocketbase\Services\BaseService;

class CrudService extends BaseService
{
    protected $result;

    public function getResult() : array
    {
        return $this->result;
    }

    public function list(string $collection, array $query) : void
    {
        $requestBuilder = $this->client->getRequestBuilder();

        $url = $requestBuilder->buildCrudRequest($this->baseCrudPath(), $collection, $query);

        $options = [
            'headers' => $this->client->getHeaders(),
            'json' => $this->client->getJson()
        ];

        $this->result = $this->client->executeHttpRequest('GET', $url, $options);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    private function baseCrudPath() : string
    {
        return join('', [
            $this->client->getPocketbaseUri(),
            'api/collections'
        ]);
    }
}