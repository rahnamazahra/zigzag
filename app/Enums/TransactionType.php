<?php

namespace App\Enums;

enum TransactionType: int
{
    case DEPOSIT = 1;
    case WITHDRAW = -1;

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
            self::DEPOSIT->value => 'واریز',
            self::WITHDRAW->value => 'بدهکار',
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
