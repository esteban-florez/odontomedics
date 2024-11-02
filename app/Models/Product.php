<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }
}