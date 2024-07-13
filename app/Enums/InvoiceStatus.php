<?php

namespace App\Enums;

enum InvoiceStatus: int
{
    case  CANCEL= 0;
    case DEPOSIT= 1;
    case PAID= 2;


    public static function default(): InvoiceStatus
    {
        return self::DEPOSIT;
    }
}
