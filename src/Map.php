<?php

namespace Noel92\Object;

/**
 * Class Map
 * @package Noel92\Object
 */
class Map extends Obj
{
    /**
     * Map constructor.
     * @param array $value Map
     */
    public function __construct(array $value = [])
    {
        $this->fields = $value;
    }
}