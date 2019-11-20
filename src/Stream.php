<?php

namespace Noel92\Object;

/**
 * Class Stream
 * @package Noel92\Object
 */
class Stream extends Obj
{
    protected $stream;

    public function __construct($stream)
    {
        $this->stream = $stream;
    }
}