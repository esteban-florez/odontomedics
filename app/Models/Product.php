<?php

namespace App\Models;

use App\Traits\HasPrice;
use App\Traits\HasSelectable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory, HasPrice, HasSelectable;

    protected $casts = [
        'stock' => 'integer',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function scopeStock(Builder $query): void
    {
        $query->join('items', 'items.product_id', '=', 'products.id')
            ->join('purchases', 'purchases.product_id', '=', 'products.id')
            ->select('products.*')
            ->selectRaw('(sum(distinct purchases.amount) - sum(distinct items.amount)) as stock')
            ->groupBy('products.id', 'products.name', 'products.description', 'products.price', 'products.created_at', 'products.updated_at');
    }
}
