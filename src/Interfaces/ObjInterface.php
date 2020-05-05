<?php

namespace Noel92\Object\Interfaces;

use Closure;
use Noel92\Object\NonPublic\Field;

/**
 * Class ObjInterface
 * @package Noel92\Object\Interfaces
 */
interface ObjInterface
{
    /**
     * From array
     * @param array $array
     * @return static
     */
    public static function fromArray(array $array = []);

    /**
     * Get field
     * @param string $field
     * @return Field
     */
    public static function field(string $field);

    /**
     * Getter
     * @param string $method
     * @return Closure
     */
    public static function getter(string $method);

    /**
     * Setter
     * @param string $method
     * @param mixed $value
     * @return Closure
     */
    public static function setter(string $method, $value);

    /**
     * Get field
     * @param string $field
     * @return mixed
     */
    public function fieldGet(string $field);

    /**
     * Set field
     * @param string $field
     * @param mixed $value
     * @return static
     */
    public function fieldSet(string $field, $value);
}