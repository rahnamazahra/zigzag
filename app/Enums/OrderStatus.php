<?php

namespace App\Enums;

enum OrderStatus: int
{
    case Accept = 1;
    case Processing = 2;
    case Completed = 3;
    case Cancelled = 4;
    case Delivered = 5;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function default(): OrderStatus
    {
        return self::Accept;
    }

    public function label(): string
    {
        return match ($this) {
            self::Accept     => __('پذیرفته شده'),
            self::Processing => __('در حال انجام'),
            self::Completed  => __('کامل شده'),
            self::Cancelled  => __('کنسل شده'),
            self::Delivered  => __('تحویل داده شده'),
        };
    }

}
