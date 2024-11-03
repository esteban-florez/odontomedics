<?php

namespace App\Http\Controllers;

use App\Enums\Code;
use App\Enums\Gender;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Services\PatientService;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('patients.index', [
            'patients' => Patient::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create', [
            'genders' => Gender::selectable(),
            'codes' => Code::values(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        $credentials = $request->safe()->only(['email', 'password']);
        PatientService::create($request, $credentials);

        return to_route('patients.index')
            ->with('alert', 'El paciente se ha registrado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', [
            'patient' => $patient,
            'codes' => Code::values(),
            'genders' => Gender::selectable(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $data = $request->safe()->except('code');
        $data['phone'] = $request->safe()->input('code') . $data['phone'];
        $patient->update($data);

        return to_route('patients.index')
            ->with('alert', 'El paciente se ha editado correctamente');
    }
}
