<?php

namespace Noel92\Object;

/**
 * Class Map
 * @package Noel92\Object
 */
class Map extends Obj
{
    /**
     * @var array
     */
    private $array;

    /**
     * From array
     * @param array $array
     * @return static
     */
    public static function fromArray(array $array = [])
    {
        return new static($array);
    }

    /**
     * Map constructor.
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * Get value
     * @param string $key
     * @param mixed $default_value
     * @return mixed
     */
    public function get(string $key, $default_value = null)
    {
        return $this->array[$key] ?? $default_value;
    }

    /**
     * Put value
     * @param string $key
     * @param mixed $value
     * @return self
     */
    public function put(string $key, $value)
    {
        $this->array[$key] = $value;

        return $this;
    }

    /**
     * Remove value
     * @param string $key
     * @return mixed
     */
    public function remove(string $key)
    {
        $remove = $this->array[$key];
        unset($this->array[$key]);

        return $remove;
    }

    /**
     * To array
     * @return array
     */
    public function toArray()
    {
        return $this->array;
    }
}