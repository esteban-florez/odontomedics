<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Purchase;

class StockController extends Controller
{
    public function index()
    {
        return view('stock.index', [
            'products' => Product::stock()
                ->addSelect('products.id', 'products.name')
                ->orderBy('products.created_at', 'DESC')
                ->groupBy('products.name')
                ->get()
        ]);
    }

    public function history()
    {
        $items = Item::with('product')->get();
        $purchases = Purchase::with('product', 'supplier')->get();

        $rows = $items->concat($purchases);
        $rows = $rows->sortByDesc('created_at');

        return view('stock.history', [
            'rows' => $rows,
        ]);
    }
}
