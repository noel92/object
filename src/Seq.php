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
    protected $value;

    /**
     * Seq constructor.
     * @param array $value Sequence
     */
    public function __construct(array $value = [])
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function set(string $name, $value, $type = null)
    {
        $index = is_numeric($name) ? $name : intval($name);
        $this->value[$index] = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function get(string $name, $default = null)
    {
        $index = is_numeric($name) ? $name : intval($name);

        return $this->value[$index] ?? $default;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->value;
    }
}