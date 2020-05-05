<?php

namespace Noel92\Object\NonPublic;

use Closure;

/**
 * Class Field
 * @package Noel92\Object
 */
class Field
{
    /**
     * @var Field[]
     */
    protected static $pool = [];

    /**
     * @var string
     */
    private $name;

    /**
     * Getter closure
     * @param string $field
     * @return Closure
     */
    public static function getter(string $field)
    {
        return function () use ($field) {
            return $this->$field;
        };
    }

    /**
     * Setter closure
     * @param string $field
     * @return Closure
     */
    public static function setter(string $field)
    {
        return function ($value) use ($field) {
            $this->$field = $value;

            return $this;
        };
    }

    /**
     * Create an instance
     * @param string $name
     * @return Field
     */
    public static function pool(string $name)
    {
        if (array_key_exists($name, self::$pool)) {
            return self::$pool[$name];
        }

        return self::$pool[$name] = new self($name);
    }

    /**
     * Field constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Getter invoke
     * @param mixed $obj
     * @return mixed
     */
    public function __invoke($obj)
    {
        return $this->getFrom($obj);
    }

    /**
     * Get
     * @param mixed $obj
     * @return mixed
     */
    public function getFrom($obj)
    {
        return self::getter($this->name)->call($obj);
    }

    /**
     * Get setter
     * @param mixed $value
     * @return Closure
     */
    public function set($value)
    {
        return function ($obj) use ($value) {
            return $this->setTo($obj, $value);
        };
    }

    /**
     * Set
     * @param mixed $obj
     * @param mixed $value
     * @return mixed
     */
    public function setTo($obj, $value)
    {
        return self::setter($this->name)->call($obj, $value);
    }
}