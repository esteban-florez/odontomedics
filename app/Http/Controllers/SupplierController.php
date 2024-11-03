<?php

namespace App\Http\Controllers;

use App\Enums\Code;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create', [
            'codes' => Code::values(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $data = $request->safe()->except(['code']);
        $code = $request->safe()->input('code');
        $data['phone'] = $code . $data['phone'];

        Supplier::create($data);

        return to_route('suppliers.index')
            ->with('alert', 'El proveedor ha sido registrado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', [
            'supplier' => $supplier,
            'codes' => Code::values(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $data = $request->safe()->except('code');
        $data['phone'] = $request->safe()->input('code') . $data['phone'];
        $supplier->update($data);

        return to_route('suppliers.index')
            ->with('alert', 'El proveedor ha sido editado correctamente');
    }
}
