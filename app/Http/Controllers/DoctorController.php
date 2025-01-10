<?php

namespace App\Http\Controllers;

use App\Enums\Specialty;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\App;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('doctors.index', [
            'doctors' => Doctor::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.create', [
            'specialties' => Specialty::selectable(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        $request->validated();
        $userRequest = ['email' => $request->email, 'password' => $request->password];
        $doctorRequest = $request->except(['email', 'password', '_token', 'password_confirmation']);

        User::create($userRequest)
            ->doctor()
            ->create($doctorRequest);

        return to_route('doctors.index')
            ->with('alert', 'El docotor se ha registrado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', [
            'doctor' => $doctor,
            'specialties' => Specialty::selectable(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return to_route('doctors.index')
            ->with('alert', 'El doctor se ha editado correctamente');
    }
}
