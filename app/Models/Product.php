<?php

namespace App\Models;

use App\Traits\HasPrice;
use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasPrice, HasSelectable;

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }
}
