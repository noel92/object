<?php

namespace Noel92\Object;

/**
 * Class JSON
 * @package Noel92\Object
 */
class JSON extends Str
{
    public static function fromArray(array $array)
    {
        return new self();
    }
}