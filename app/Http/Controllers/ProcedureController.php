<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProcedureRequest;
use App\Http\Requests\UpdateProcedureRequest;
use App\Models\Procedure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $with = ['appointments', 'appointments.doctor', 'bill', 'patient', 'treatment', 'items', 'items.product'];

        $procedures = Procedure::with($with)
            ->when(!$user->is_admin, fn(Builder $query) 
                => $query->where('patient_id', $user->patient->id))
            ->latest()
            ->get();

        return view('procedures.index', [
            'procedures' => $procedures,
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
    public function store(StoreProcedureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Procedure $procedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Procedure $procedure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcedureRequest $request, Procedure $procedure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Procedure $procedure)
    {
        //
    }
}
