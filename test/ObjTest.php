<?php

namespace Noel92\Object\Test;

use Noel92\Object\Date;
use Noel92\Object\JSON;
use Noel92\Object\Map;
use Noel92\Object\Obj;
use Noel92\Object\Seq;
use Noel92\Object\Str;
use Noel92\Object\Stream;
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

    /**
     * @depends testGet
     */
    public function testIntSet()
    {
        $obj = new Obj();
        $obj->intSet('foo', '123abc');
        $this->assertSame(123, $obj->get('foo'));
    }

    public function testFloatGet()
    {
        $obj = new Obj();
        $this->assertSame(0.0, $obj->floatGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testFloatSet()
    {
        $obj = new Obj();
        $obj->floatSet('foo', 0);
        $this->assertSame(0.0, $obj->get('foo'));
    }

    public function testStringGet()
    {
        $obj = new Obj();
        $this->assertSame('', $obj->stringGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testStringSet()
    {
        $obj = new Obj();
        $obj->stringSet('foo', 'bar');
        $this->assertSame('bar', $obj->get('foo'));
    }

    public function testBoolGet()
    {
        $obj = new Obj();
        $this->assertSame(false, $obj->boolGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testBoolSet()
    {
        $obj = new Obj();
        $obj->boolSet('foo', 'bar');
        $this->assertSame(true, $obj->get('foo'));
    }

    public function testArrayGet()
    {
        $obj = new Obj();
        $this->assertSame([], $obj->arrayGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testArraySet()
    {
        $obj = new Obj();
        $obj->arraySet('foo', 'bar');
        $this->assertSame(['bar'], $obj->get('foo'));
    }

    public function testObjGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Obj::class, $obj->objGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testObjSet()
    {
        $obj = new Obj();
        $obj->objSet('foo', 'bar');
        $this->assertInstanceOf(Obj::class, $obj->get('foo'));
    }

    public function testSeqGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Seq::class, $obj->seqGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testSeqSet()
    {
        $obj = new Obj();
        $obj->seqSet('foo', 'bar');
        $this->assertInstanceOf(Seq::class, $obj->get('foo'));
    }

    public function testMapGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Map::class, $obj->mapGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testMapSet()
    {
        $obj = new Obj();
        $obj->mapSet('foo', 'bar');
        $this->assertInstanceOf(Map::class, $obj->get('foo'));
    }

    public function testStrGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Str::class, $obj->strGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testStrSet()
    {
        $obj = new Obj();
        $obj->strSet('foo', 'bar');
        $this->assertInstanceOf(Str::class, $obj->get('foo'));
    }

    public function testStreamGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Stream::class, $obj->streamGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testStreamSet()
    {
        $obj = new Obj();
        $obj->streamSet('foo', 'bar');
        $this->assertInstanceOf(Stream::class, $obj->get('foo'));
    }

    public function testDateGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Date::class, $obj->dateGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testDateSet()
    {
        $obj = new Obj();
        $obj->dateSet('foo', 'bar');
        $this->assertInstanceOf(Date::class, $obj->get('foo'));
    }

    public function testJsonGet()
    {
        $obj = new Obj();
        $this->assertInstanceOf(JSON::class, $obj->jsonGet('foo'));
    }

    /**
     * @depends testGet
     */
    public function testJsonSet()
    {
        $obj = new Obj();
        $obj->jsonSet('foo', 'bar');
        $this->assertInstanceOf(JSON::class, $obj->get('foo'));
    }

    public function testToMap()
    {
        $obj = new Obj();
        $this->assertInstanceOf(Map::class, $obj->toMap());
    }

    public function testToJSON()
    {
        $obj = new Obj();
        $this->assertInstanceOf(JSON::class, $obj->toJSON());
    }
}