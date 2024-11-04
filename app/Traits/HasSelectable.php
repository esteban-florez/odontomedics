<?php

namespace App\Traits;

use stdClass;

trait HasSelectable
{
    public static function selectable()
    {
        return static::latest()
            ->get()
            ->map(fn($item) => static::toOption($item));
    }

    private static function toOption($item)
    {
        $option = new stdClass;
        $option->id = $item->id;
        $option->label = $item->fullname ?? $item->name;
        return $option;
    }
}
