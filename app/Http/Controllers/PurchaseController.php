<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePurchaseRequest;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;

class PurchaseController extends Controller
{
    public function create()
    {
        return view('purchases.create', [
            'suppliers' => Supplier::selectable(),
            'products' => Product::selectable(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        $data = $request->validated();

        Purchase::create($data);

        // inventory.index
        return to_route('products.index')
            ->with('alert', 'Se ha registrado el pedido correctamente.');
    }
}
