<?php

namespace Noel92\Object;

/**
 * Class Seq
 * @package Noel92\Object
 */
class Seq extends Obj
{
    /**
     * @var array
     */
    protected $value;

    /**
     * Seq constructor.
     * @param array $value Sequence
     */
    public function __construct(array $value = [])
    {
        $this->value = $value;
    }
}