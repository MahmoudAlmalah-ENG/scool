<?php

namespace App\Enum;

enum WorkshopEnum: int
{
    case PENDING = 0;
    case APPROVED = 1;
    case REJECTED = 2;


    public static function toArray(): array
    {
        return [
            self::PENDING->value,
            self::APPROVED->value,
            self::REJECTED->value,
        ];
    }

    public static function getStatuses(): array
    {
        return [
            self::PENDING->value => 'Pending',
            self::APPROVED->value => 'Approved',
            self::REJECTED->value => 'Rejected',
        ];
    }
}
