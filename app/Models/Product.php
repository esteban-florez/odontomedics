<?php

namespace App\Models;

use App\Traits\HasPrice;
use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasPrice, HasSelectable;

    protected $casts = [
        'stock' => 'integer',
    ];

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }
}
