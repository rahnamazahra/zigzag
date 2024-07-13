<?php

namespace App\Enums;

enum OrderStatus: int
{
    case cancel = 0;
    case Accept = 1;
    case Doing = 2;
    case Finished = 3;

    public static function default(): OrderStatus
    {
        return self::Accept;
    }
}
