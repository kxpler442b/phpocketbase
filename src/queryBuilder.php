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

class QueryBuilder
{
    private $client;
    private $query;
    private $result;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __destruct() {}

    
}