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

namespace Phpocketbase\Utils;

class RequestBuilder
{
    private $path;
    private $query;
    private $result;

    public function buildCrudRequest(string $basePath, string $collection, string $id, string $query) : string
    {
        if (!$id) {
            $this->path = $basePath . $collection . '/records';
        } else {
            $this->path = $basePath . $collection . '/records/' . $id;
        };

        return join('?', [
            $this->path,
            $this->query
        ]);
    }
}