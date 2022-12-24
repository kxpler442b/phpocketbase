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

class AuthService extends BaseService
{
    private $result;

    public function authWithPassword(string $collection, string $username, string $password)
    {
        $requestBuilder = $this->client->getRequestBuilder();

        $request = $requestBuilder->buildAuthRequest($this->client->getPocketbaseUri(), $collection);

        $body = [
            'identity' => $username,
            'password' => $password
        ];

        $options = [
            'headers' => $this->client->getHeaders(),
            'json' => json_encode($body)
        ];

        $this->result = $this->client->executeHttpRequest('POST', $request, $options);

        return $this->result;
    }
}