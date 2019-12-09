<?php

namespace Noel92\Object;

/**
 * Class Map
 * @package Noel92\Object
 */
class Map extends Obj
{
    /**
     * @var array
     */
    protected $value;

    /**
     * Map constructor.
     * @param array $value Map
     */
    public function __construct(array $value = [])
    {
        $this->value = $value;
    }
}