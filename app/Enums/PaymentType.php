<?php

namespace App\Enums;

enum PaymentType: int
{
    case POS = 1;
    case CART = 2;
    case CASH = 3;

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getKeys(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function labels(): array
    {
        return [
            self::POS->value => 'POS',
            self::CART->value => 'کارت به کارت',
            self::CASH->value => 'نقد',
        ];
    }

    public static function getArray(): array
    {
        return array_reduce(self::cases(), function ($carry, $case) {
            $carry[$case->value] = self::labels()[$case->value];
            return $carry;
        }, []);
    }
}
