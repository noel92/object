<?php

namespace Noel92\Object;

/**
 * Class Obj
 * @package Noel92\Object
 */
class Obj
{
    protected const TYPE_INT    = 1;
    protected const TYPE_FLOAT  = 2;
    protected const TYPE_STRING = 3;
    protected const TYPE_BOOL   = 4;
    protected const TYPE_ARRAY  = 5;
    protected const TYPE_OBJ    = 6;
    protected const TYPE_SEQ    = 7;
    protected const TYPE_MAP    = 8;
    protected const TYPE_STR    = 9;
    protected const TYPE_STREAM = 10;
    protected const TYPE_DATE   = 11;
    protected const TYPE_JSON   = 12;

    /**
     * @var string[] Fields
     */
    private $fields = [];

    /**
     * From array to obj
     * @param array $array Array
     * @return Obj
     */
    public static function fromArray(array $array)
    {
        return new static();
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
        return static::fromArray($this->arrayGet($name));
    }

    /**
     * Get Seq field
     * @param string $name
     * @return Seq
     */
    public function seqGet(string $name): Seq
    {
        return new Seq($this->arrayGet($name));
    }

    /**
     * Get Map field
     * @param string $name
     * @return Map
     */
    public function mapGet(string $name): Map
    {
        return new Map($this->arrayGet($name));
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
                $value = intval($value);
                break;
            case static::TYPE_FLOAT:
                $value = floatval($value);
                break;
            case static::TYPE_STRING:
                $value = strval($value);
                break;
            case static::TYPE_BOOL:
                $value = boolval($value);
                break;
            case static::TYPE_ARRAY:
                $value = (array)$value;
                break;
            case static::TYPE_OBJ:
                $value = Obj::fromArray((array)$value);
                break;
            case static::TYPE_SEQ:
                $value = new Seq((array)$value);
                break;
            case static::TYPE_MAP:
                $value = new Map((array)$value);
                break;
            case static::TYPE_STR:
                $value = new Str(strval($value));
                break;
            case static::TYPE_STREAM:
                $value = new Stream($value);
                break;
            case static::TYPE_DATE:
                $value = new Date($value);
                break;
            case static::TYPE_JSON:
                $value = new JSON($value);
                break;
            default:
        }
        $this->fields[$name] = $value;

        return $this;
    }

    public function intSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_INT);
    }

    public function floatSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_FLOAT);
    }

    public function stringSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_STRING);
    }

    public function boolSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_BOOL);
    }

    public function arraySet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_ARRAY);
    }

    public function objSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_OBJ);
    }

    public function seqSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_SEQ);
    }

    public function mapSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_MAP);
    }

    public function strSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_STR);
    }

    public function streamSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_STREAM);
    }

    public function dateSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_DATE);
    }

    public function jsonSet(string $name, $value)
    {
        return $this->set($name, $value, static::TYPE_JSON);
    }

    /**
     * Convert to Map
     * @return Map
     */
    public function toMap(): Map
    {
        return new Map($this->fields);
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