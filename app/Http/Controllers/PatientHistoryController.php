<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientHistoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Patient $patient)
    {
        $history = $patient->history()
            ->get();

        return view('patients-history.index', [
            'history' => $history,
            'patient' => $patient,
        ]);
    }
}
