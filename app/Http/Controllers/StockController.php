<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
 
    }
}
