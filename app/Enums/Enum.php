<?php

namespace App\Enums;

use stdClass;

trait Enum {
    public static function keys() {
        $cases = static::cases();
        return collect($cases);
    }

    public static function values() {
        return static::keys()->map(fn($case) => $case->value);
    }

    public static function selectable() {
        return static::values()->map(function ($value) {
            $option = new stdClass;
            $option->id = $value;
            $option->label = $value;
            return $option;
        });
    }
}
