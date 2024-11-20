<?php

namespace App\Models;

use App\Traits\HasPrice;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Bill extends Model
{
    use HasFactory, HasPrice;

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    public function itemsTotal(): Attribute
    {
        return Attribute::make(function () {
            return $this->total - $this->procedure->treatment->price;
        });
    }

    public function fitemsTotal(): Attribute
    {
        return Attribute::make(function () {
            $number = Number::format($this->items_total, precision: 2, locale: 'es');
            return "\${$number}";
        });
    }
}
