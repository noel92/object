<?php

namespace Noel92\Object;

/**
 * Class Seq
 * @package Noel92\Object
 */
class Seq extends Obj
{
    private $seq;

    public function __construct(array $seq)
    {
        $this->seq = $seq;
    }
}