<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Bill;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $with = ['procedure', 'procedure.patient', 'procedure.treatment', 'procedure.items', 'procedure.items.product'];

        $patientId = $request->query('patient_id');

        $bills = Bill::with($with)
            ->when(!$user->is_admin, fn(Builder $query) 
                => $query->whereHas('procedure', fn(Builder $sub)
                    => $sub->where('patient_id', $user->patient->id)
                )
            )
            ->when($patientId && $user->is_admin, fn(Builder $query)
                => $query->whereHas('procedure', fn(Builder $sub)
                    => $sub->where('patient_id', $patientId)
                )
            )
            ->latest()
            ->get();

        return view('bills.index', [
            'bills' => $bills,
            'patients' => Patient::selectable(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBillRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
