<?php

namespace Noel92\Object;

/**
 * Class Stream
 * @package Noel92\Object
 */
class Stream extends Obj
{
    /**
     * Stream constructor.
     * @param $value Resource
     */
    public function __construct($value)
    {
        $this->set('value', $value);
    }
}