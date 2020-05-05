<?php

namespace Noel92\Object\Test;

use Noel92\Object\Seq;
use PHPUnit\Framework\TestCase;

class SeqTest extends TestCase
{
    public function testToArray()
    {
        $seq = new Seq();
        $this->assertSame([], $seq->toArray());
    }

    /**
     * @depends testToArray
     */
    public function testFromArray()
    {
        $seq = Seq::fromArray([1,2]);
        $this->assertSame([1, 2], $seq->toArray());
    }

    public function testGet()
    {
        $seq = new Seq();
        $this->assertNull($seq->get(1));
    }

    /**
     * @depends testToArray
     */
    public function testAdd()
    {
        $seq = new Seq([1]);
        $this->assertSame($seq, $seq->add(0, 0));
        $this->assertSame([0,1], $seq->toArray());
    }

    /**
     * @depends testGet
     */
    public function testSet()
    {
        $seq = new Seq([1]);
        $this->assertSame($seq, $seq->set(0, 2));
        $this->assertSame(2, $seq->get(0));
    }

    public function testRemove()
    {
        $seq = new Seq([0]);
        $this->assertSame(0, $seq->remove(0));
    }
}