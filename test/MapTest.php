<?php

namespace Noel92\Object\Test;

use Noel92\Object\Map;
use PHPUnit\Framework\TestCase;

class MapTest extends TestCase
{
    public function testToArray()
    {
        $map = new Map();
        $this->assertSame([], $map->toArray());
    }

    /**
     * @depends testToArray
     */
    public function testFromArray()
    {
        $map = Map::fromArray([1,2]);
        $this->assertSame([1, 2], $map->toArray());
    }

    public function testGet()
    {
        $map = new Map(['foo' => 'bar']);
        $this->assertSame('bar', $map->get('foo'));
    }

    /**
     * @depends testGet
     */
    public function testPut()
    {
        $map = new Map(['foo' => 'bar']);
        $this->assertSame($map, $map->put('foo', 'null'));
        $this->assertSame('null', $map->get('foo'));
    }

    public function testRemove()
    {
        $map = new Map(['foo' => 'bar']);
        $this->assertSame('bar', $map->remove('foo'));
        $this->assertNull($map->get('foo'));
    }
}