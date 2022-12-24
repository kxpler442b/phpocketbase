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

use Phpocketbase\Client;

abstract class BaseService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __destruct() {}

    public function getClient() : Client
    {
        return $this->client;
    }
}