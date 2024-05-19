<?php

namespace App\Enum;

use function Symfony\Component\String\s;

enum UserEnum: int
{
    case MALE = 1;
    case FEMALE = 2;

    case ADMIN = 3;
    case USER = 4;

    public static function toArrayGender(): array
    {
        return [
            self::MALE->value,
            self::FEMALE->value
        ];
    }

    public static function toArrayRole(): array
    {
        return [
            self::ADMIN->value,
            self::USER->value
        ];
    }

    public static function getRoleName(int $role): string
    {
        return match ($role) {
            self::ADMIN->value => 'Admin',
            self::USER->value => 'User',
            default => 'Unknown'
        };
    }

    public static function getGenderName(int $gender): string
    {
        return match ($gender) {
            self::FEMALE->value => 'Female',
            self::MALE->value => 'Male',
            default => 'Unknown'
        };
    }
}
