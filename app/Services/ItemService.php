<?php

namespace App\Services;

use App\Models\Item;
use App\Models\Product;
use App\Models\User;
use App\Notifications\LowStock;
use Illuminate\Support\Facades\Notification;

class ItemService
{
    public static function forProcedure($procedureId, $data)
    {
        $items = json_decode($data->input('items'));
        $ids = [];

        foreach ($items as $item) {
            $ids[] = $item->id;
            Item::create([
                'amount' => $item->amount,
                'product_id' => $item->id,
                'procedure_id' => $procedureId,
            ]);
        }

        $products = Product::stock()
            ->whereIn('products.id', $ids)
            ->get();

        logger('products', [$products]);
            
        $admin = User::where('is_admin', true)->first();

        foreach ($products as $product) {
            if ($product->stock > 10) {
                return;
            }
    
            $notif = new LowStock($product);
            Notification::send($admin, $notif);
        }
    }
}
