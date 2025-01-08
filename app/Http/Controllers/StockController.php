<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Product;
use App\Models\Purchase;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::stock()
            ->orderBy('products.created_at', 'DESC')
            ->get();

        return view('stock.index', [
            'products' => $products,
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
