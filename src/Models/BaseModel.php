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

namespace Phpocketbase\Models;

abstract class BaseModel
{
    public function __construct(array $data)
    {
        $this->load($data);
    }

    public function getObject() : object
    {
        return (object) $this;
    }

    private function load(array $data)
    {
        foreach ($data as $key => $value) {
            $this[$key] = $value;
        }
    }
}