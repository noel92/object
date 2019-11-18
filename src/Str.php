<?php

namespace Noel92\Object;

/**
 * Class Str
 * @package Noel92\Object
 */
class Str extends Obj
{
    private $str;

    public function __construct(string $str)
    {
        $this->str = $str;
    }
}