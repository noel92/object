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
     * @var string[] Fields
     */
    protected $fields = [];

    /**
     * Create an Obj
     * @return Obj
     */
    public static function create()
    {
        return new static();
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
     * Get value by field
     * @param string $name Field
     * @param mixed|null $default Default value
     * @return mixed|null
     */
    public function get(string $name, $default = null)
    {
        return $this->fields[$name] ?? $default;
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
        return new Date($this->get($name));
    }

    /**
     * Get Date Field
     * @param string $name
     * @return JSON
     */
    public function jsonGet(string $name): JSON
    {
        return new JSON($this->get($name));
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
        switch ($type) {
            case static::TYPE_INT:
                return $this->intSet($name, $value);
            case static::TYPE_FLOAT:
                return $this->floatSet($name, $value);
            case static::TYPE_STRING:
                return $this->stringSet($name, $value);
            case static::TYPE_BOOL:
                return $this->boolSet($name, $value);
            case static::TYPE_ARRAY:
                return $this->arraySet($name, $value);
            case static::TYPE_OBJ:
                return $this->objSet($name, $value);
            case static::TYPE_SEQ:
                return $this->seqSet($name, $value);
            case static::TYPE_MAP:
                return $this->mapSet($name, $value);
            case static::TYPE_STR:
                return $this->strSet($name, $value);
            case static::TYPE_STREAM:
                return $this->streamSet($name, $value);
            case static::TYPE_DATE:
                return $this->dateSet($name, $value);
            case static::TYPE_JSON:
                return $this->jsonSet($name, $value);
            default:
                $this->fields[$name] = $value;

                return $this;
        }
    }

    /**
     * Set int value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function intSet(string $name, $value)
    {
        $this->fields[$name] = intval($value);

        return $this;
    }

    /**
     * Set float value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function floatSet(string $name, $value)
    {
        $this->fields[$name] = floatval($value);

        return $this;
    }

    /**
     * Set string value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function stringSet(string $name, $value)
    {
        $this->fields[$name] = strval($value);

        return $this;
    }

    /**
     * Set bool value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function boolSet(string $name, $value)
    {
        $this->fields[$name] = boolval($value);

        return $this;
    }

    /**
     * Set array value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function arraySet(string $name, $value)
    {
        $this->fields[$name] = (array)$value;

        return $this;
    }

    /**
     * Set Obj value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function objSet(string $name, $value)
    {
        $this->fields[$name] = Obj::fromArray((array)$value);

        return $this;
    }

    /**
     * Set Seq value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function seqSet(string $name, $value)
    {
        $this->fields[$name] = Seq::fromArray((array)$value);

        return $this;
    }

    /**
     * Set Map value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function mapSet(string $name, $value)
    {
        $this->fields[$name] = Map::fromArray((array)$value);

        return $this;
    }

    /**
     * Set Str value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function strSet(string $name, $value)
    {
        $this->fields[$name] = new Str($value);

        return $this;
    }

    /**
     * Set Stream value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function streamSet(string $name, $value)
    {
        $this->fields[$name] = new Stream($value);

        return $this;
    }

    /**
     * Set Date value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function dateSet(string $name, $value)
    {
        $this->fields[$name] = new Date($value);

        return $this;
    }

    /**
     * Set JSON value
     * @param string $name
     * @param mixed $value
     * @return static
     */
    public function jsonSet(string $name, $value)
    {
        $this->fields[$name] = new JSON($value);

        return $this;
    }

    /**
     * Convert to Map
     * @return Map
     */
    public function toMap(): Map
    {
        return Map::fromArray($this->fields);
    }

    /**
     * Convert to JSON
     * @return JSON
     */
    public function toJSON(): JSON
    {
        return JSON::fromArray($this->fields);
    }
}