<?php

namespace App\Models;

use App\Traits\HasPhone;
use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory, HasPhone, HasSelectable;

    public function purchases() {
        return $this->hasMany(Purchase::class);
    }
}
