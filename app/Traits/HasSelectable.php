<?php

namespace App\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;
use stdClass;

trait HasSelectable
{
    public static function selectable(Builder $builder = null)
    {
        $query = $builder ?? static::latest();

        return $query->get()
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
