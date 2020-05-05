<?php

namespace Noel92\Object\Traits;

use Noel92\Object\NonPublic\Field;

/**
 * Class ObjTrait
 * @package Noel92\Object\Traits
 */
trait ObjTrait
{
    /**
     * @inheritDoc
     */
    public static function fromArray(array $array = [])
    {
        $instance = new static();
        foreach ($array as $field => $value) {
            $instance->fieldSet($field, $value);
        }

        return $instance;
    }

    /**
     * @inheritDoc
     */
    public static function field(string $field)
    {
        return Field::pool($field);
    }

    /**
     * @inheritDoc
     */
    public static function getter(string $method)
    {
        return function ($obj) use ($method) {
            return $obj->$method();
        };
    }

    /**
     * @inheritDoc
     */
    public static function setter(string $method, $value)
    {
        return function ($obj) use ($method, $value) {
            return $obj->$method($value);
        };
    }

    /**
     * @inheritDoc
     */
    public function fieldGet(string $field)
    {
        return self::field($field)->getFrom($this);
    }

    /**
     * @inheritDoc
     */
    public function fieldSet(string $field, $value)
    {
        return self::field($field)->setTo($this, $value);
    }
}