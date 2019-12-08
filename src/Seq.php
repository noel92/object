<?php

namespace Noel92\Object;

/**
 * Class Seq
 * @package Noel92\Object
 */
class Seq extends Obj
{
    /**
     * Seq constructor.
     * @param array $value Sequence
     */
    public function __construct(array $value)
    {
        $this->fields = $value;
    }
}