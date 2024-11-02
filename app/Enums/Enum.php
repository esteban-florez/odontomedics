<?php

namespace App\Enums;

trait Enum {
    public static function keys() {
        $cases = static::cases();
        return collect($cases);
    }

    public static function values() {
        return static::keys()->map(fn($case) => $case->value);
    }
}
