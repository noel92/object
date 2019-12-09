<?php

namespace Noel92\Object;

/**
 * Class Obj
 * @package Noel92\Object
 */
class Obj
{
    protected const TYPE_INT = 1;

    protected const TYPE_FLOAT = 2;

    protected const TYPE_STRING = 3;

    protected const TYPE_BOOL = 4;

    protected const TYPE_ARRAY = 5;

    protected const TYPE_OBJ = 6;

    protected const TYPE_SEQ = 7;

    protected const TYPE_MAP = 8;

    protected const TYPE_STR = 9;

    protected const TYPE_STREAM = 10;

    protected const TYPE_DATE = 11;

    protected const TYPE_JSON = 12;

    /**
     * Create an Obj
     * @return Obj
     */
    public static function create()
    {
        return new static(...func_get_args());
    }

    /**
     * From array to obj
     * @param array $array Array
     * @return static
     */
    public static function fromArray(array $array)
    {
        return array_reduce(
            array_keys($array),
            function (Obj $obj, $name) use ($array) {
                return $obj->set($name, $array[$name]);
            },
            new static()
        );
    }

    /**
     * Type conversion
     * @param mixed $var
     * @param int $type
     * @return array|bool|float|int|string|Date|Obj|Seq|Map|Seq|Str|Stream
     */
    protected static function cast($var, $type)
    {
        switch ($type) {
            case self::TYPE_INT:
                $_var = intval($var);
                break;
            case self::TYPE_FLOAT:
                $_var = floatval($var);
                break;
            case self::TYPE_STRING:
                $_var = strval($var);
                break;
            case self::TYPE_BOOL:
                $_var = boolval($var);
                break;
            case self::TYPE_ARRAY:
                $_var = (array)$var;
                break;
            case self::TYPE_OBJ:
                $var = (array)$var;
                $_var = $var instanceof Obj ? $var : Obj::fromArray($var);
                break;
            case self::TYPE_SEQ:
                $var = (array)$var;
                $_var = $var instanceof Seq ? $var : Seq::fromArray($var);
                break;
            case self::TYPE_MAP:
                $var = (array)$var;
                $_var = $var instanceof Map ? $var : Map::fromArray($var);
                break;
            case self::TYPE_STR:
                $_var = $var instanceof Str ? $var : new Str((string)$var);
                break;
            case self::TYPE_STREAM:
                $_var = $var instanceof Stream ? $var : new Stream($var);
                break;
            case self::TYPE_DATE:
                $_var = $var instanceof Date ? $var : new Date((string)$var);
                break;
            case self::TYPE_JSON:
                $_var = $var instanceof JSON ? $var : new JSON((string)$var);
                break;
            default:
                $_var = $var;
        }

        return $_var;
    }

    /**
     * Get value by field
     * @param string $name Field
     * @param mixed|null $default Default value
     * @return mixed|null
     */
    public function get(string $name, $default = null)
    {
        return (function () use ($name, $default) {
            return $this->$name ?? $default;
        })->call($this);
    }

    /**
     * Set value by field
     * @param string $name Field
     * @param mixed $value Value
     * @param int|null $type Type
     * @return static
     */
    public function set(string $name, $value, $type = null)
    {
        $value = self::cast($value, $type);
        (function () use ($name, $value) {
            $this->$name = $value;
        })->call($this);

        return $this;
    }

    /**
     * Convert to array
     * @return array
     */
    public function toArray(): array
    {
        return (function () {
            return get_object_vars($this);
        })->call($this);
    }

    /**
     * Get int field
     * @param string $name
     * @return int
     */
    public function intGet(string $name): int
    {
        return intval($this->get($name));
    }

    /**
     * Get float field
     * @param string $name
     * @return float
     */
    public function floatGet(string $name): float
    {
        return floatval($this->get($name));
    }

    /**
     * Get string field
     * @param string $name
     * @return string
     */
    public function stringGet(string $name): string
    {
        return strval($this->get($name));
    }

    /**
     * Get bool field
     * @param string $name
     * @return bool
     */
    public function boolGet(string $name): bool
    {
        return boolval($this->get($name));
    }

    /**
     * Get array field
     * @param string $name
     * @return array
     */
    public function arrayGet(string $name): array
    {
        return (array)$this->get($name);
    }

    /**
     * Get Obj field
     * @param string $name
     * @return Obj
     */
    public function objGet(string $name): Obj
    {
        $val = $this->get($name);
        if (!$val instanceof Obj) {
            $val = Obj::fromArray((array)$val);
        }

        return $val;
    }

    /**
     * Get Seq field
     * @param string $name
     * @return Seq
     */
    public function seqGet(string $name): Seq
    {
        $val = $this->get($name);
        if (!$val instanceof Seq) {
            $val = Seq::fromArray((array)$val);
        }

        return $val;
    }

    /**
     * Get Map field
     * @param string $name
     * @return Map
     */
    public function mapGet(string $name): Map
    {
        $val = $this->get($name);
        if (!$val instanceof Map) {
            $val = Map::fromArray((array)$val);
        }

        return $val;
    }

    /**
     * Get Str field
     * @param string $name
     * @return Str
     */
    public function strGet(string $name): Str
    {
        return new Str($this->stringGet($name));
    }

    /**
     * Get Stream field
     * @param string $name
     * @return Stream
     */
    public function streamGet(string $name): Stream
    {
        return new Stream($this->get($name));
    }

    /**
     * Get Date Field
     * @param string $name
     * @return Date
     */
    public function dateGet(string $name): Date
    {
        return new Date($this->stringGet($name));
    }

    /**
     * Get Date Field
     * @param string $name
     * @return JSON
     */
    public function jsonGet(string $name): JSON
    {
        return new JSON($this->stringGet($name));
    }

    /**
     * Set int value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function intSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_INT);
    }

    /**
     * Set float value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function floatSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_FLOAT);
    }

    /**
     * Set string value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function stringSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_STRING);
    }

    /**
     * Set bool value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function boolSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_BOOL);
    }

    /**
     * Set array value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function arraySet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_ARRAY);
    }

    /**
     * Set Obj value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function objSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_OBJ);
    }

    /**
     * Set Seq value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function seqSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_SEQ);
    }

    /**
     * Set Map value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function mapSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_MAP);
    }

    /**
     * Set Str value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function strSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_STR);
    }

    /**
     * Set Stream value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function streamSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_STREAM);
    }

    /**
     * Set Date value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function dateSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_DATE);
    }

    /**
     * Set JSON value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function jsonSet(string $name, $value)
    {
        return $this->set($name, $value, self::TYPE_JSON);
    }

    /**
     * Convert to Map
     * @return Map
     */
    public function toMap(): Map
    {
        return Map::fromArray($this->toArray());
    }

    /**
     * Convert to JSON
     * @return JSON
     */
    public function toJSON(): JSON
    {
        return JSON::fromArray($this->toArray());
    }
}