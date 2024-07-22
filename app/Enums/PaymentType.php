<?php

namespace App\Enums;

enum PaymentType: int
{
    case DEPOSIT = 1;
    case WITHDRAW = -1;
}
