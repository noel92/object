<?php

namespace Noel92\Object;

/**
 * Class Str
 * @package Noel92\Object
 */
class Str extends Obj
{
    public const UTF_8 = 'UTF-8';

    /**
     * @var string
     */
    private $string;

    /**
     * From array
     * @param array $array
     * @return static
     */
    public static function fromArray(array $array = [])
    {
        return new static(implode('', $array));
    }

    /**
     * Convert to utf8
     * @param string $string
     * @return string
     */
    public static function toUTF8(string $string)
    {
        return (string)iconv(
            mb_detect_encoding($string, mb_detect_order(), true),
            self::UTF_8,
            $string
        );
    }

    /**
     * Str constructor.
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = self::toUTF8($string);
    }
}