<?php

namespace App\Enum;

enum RoleEnum : string
{
    case ADMIN = 'admin';
    case USER = 'user';

    public static function values(): array
    {
        return array_map(fn (self $role) => $role->value, self::cases());
    }
}
