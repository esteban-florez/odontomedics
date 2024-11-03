<?php

namespace App\Models;

use App\Traits\HasPhone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, HasPhone;

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }
}
