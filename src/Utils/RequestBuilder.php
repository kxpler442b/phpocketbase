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
        $this->query = $query;

        if (isset($id) && $id !== '') {
            $this->path = $basePath . $collection . '/records/' . $id;
        } else {
            $this->path = $basePath . $collection . '/records';
        };

        $url = $this->path . '?' . $this->query;

        return $url;
    }

    public function buildAuthRequest(string $basePath, string $collection) : string
    {
        $this->path = $basePath . 'collections/' . $collection . 'auth-with-password';

        return $this->path;
    }
}