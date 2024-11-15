<?php

namespace App\Models;

use App\Traits\HasPrice;
use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory, HasPrice, HasSelectable;

    public function procedures() {
        return $this->hasMany(Procedure::class);
    }
}
