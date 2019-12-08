<?php

namespace Noel92\Object;

/**
 * Class Str
 * @package Noel92\Object
 */
class Str extends Obj
{
    /**
     * Str constructor.
     * @param string $value String
     */
    public function __construct(string $value)
    {
        $this->set('value', $value);
    }
}