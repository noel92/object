<?php

namespace Noel92\Object\Test;

use Noel92\Object\Seq;
use PHPUnit\Framework\TestCase;

class SeqTest extends TestCase
{
    public function testSet()
    {
        $seq = new Seq();
        $seq->set(0, 1);
        $seq->set(1, 2);
    }
}