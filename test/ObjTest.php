<?php

namespace Noel92\Object\Test;

use Noel92\Object\Field;
use Noel92\Object\Obj;
use PHPUnit\Framework\TestCase;

/**
 * Class ObjTest
 * @package Noel92\Object\Test
 */
class ObjTest extends TestCase
{
    public function testGet()
    {
        $obj = new Obj();
        $obj->foo = 'bar';
        $this->assertSame('bar', $obj->fieldGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testSet()
    {
        $obj = new Obj();
        $obj->fieldSet('foo', 'bar');
        $this->assertSame('bar', $obj->fieldGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testFromArray()
    {
        $obj = Obj::fromArray(['foo' => 'bar']);
        $this->assertInstanceOf(Obj::class, $obj);
        $this->assertSame('bar', $obj->fieldGet('foo'));
    }

    public function testField()
    {
        $this->assertInstanceOf(Field::class, Obj::field('test'));
    }
}