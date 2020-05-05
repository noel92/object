<?php

namespace Noel92\Object;

use DateTime;
use DateTimeZone;
use Exception;
use Noel92\Object\Interfaces\ObjInterface;
use Noel92\Object\Traits\ObjTrait;

/**
 * Class Date
 * @package Noel92\Object
 */
class Date extends DateTime implements ObjInterface
{
    use ObjTrait;

    /**
     * Date constructor.
     * @param string $time
     * @param DateTimeZone|null $timezone
     * @throws Exception
     */
    public function __construct($time = 'now', DateTimeZone $timezone = null)
    {
        parent::__construct($time, $timezone);
    }

}