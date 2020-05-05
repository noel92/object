<?php

namespace Noel92\Object;

/**
 * Class Seq
 * @package Noel92\Object
 */
class Seq extends Obj
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
     * Seq constructor.
     * @param array $value
     */
    public function __construct(array $value = [])
    {
        $this->array = array_values($value);
    }

    /**
     * Add an element
     * @param int $index
     * @param mixed $value
     * @return self
     */
    public function add(int $index, $value)
    {
        array_splice($this->array, $index, 0, $value);

        return $this;
    }

    /**
     * Remove an element
     * @param int $index
     * @return mixed
     */
    public function remove(int $index)
    {
        return array_splice($this->array, $index, 1)[0] ?? null;
    }

    /**
     * Get an element
     * @param int $index
     * @param mixed $default_value
     * @return mixed
     */
    public function get(int $index, $default_value = null)
    {
        return $this->array[$index] ?? $default_value;
    }

    /**
     * Set an element
     * @param int $index
     * @param mixed $value
     * @return self
     */
    public function set(int $index, $value)
    {
        $this->array[$index] = $value;

        return $this;
    }

    /**
     * Get sequence size
     * @return int
     */
    public function size()
    {
        return count($this->array);
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