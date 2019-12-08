<?php

namespace Noel92\Object\Test;

use Noel92\Object\Obj;
use PHPUnit\Framework\TestCase;

/**
 * Class ObjTest
 * @package Noel92\Object\Test
 */
class ObjTest extends TestCase
{
    public function testCreate()
    {
        $this->assertInstanceOf(Obj::class, Obj::create());
    }

    public function testGet()
    {
        $obj = new Obj();
        $this->assertNull($obj->get('foo'));
    }

    /**
     * @depends testGet
     */
    public function testSet()
    {
        $obj = new Obj();
        $obj->set('foo', 'bar');
        $this->assertSame('bar', $obj->get('foo'));
    }

    public function testIntGet()
    {
        $obj = new Obj();
        $this->assertSame(0, $obj->intGet('foo'));
    }

    public function testIntSet()
    {
        $obj = new Obj();
        $obj->intSet('foo', '123abc');
        $this->assertSame(123, $obj->intGet('foo'));
    }
}