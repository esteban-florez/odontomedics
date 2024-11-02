<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnboardPatientRequest;

class OnboardController extends Controller
{
    /**
     * Store email and password in session for onboarding.
     */
    public function store(OnboardPatientRequest $request) {
        $data = $request->validated();
        $request->session()->put('email', $data['email']);
        $request->session()->put('password', $data['password']);
        return to_route('register.create');
    }

    /**
     * Reset onboarding process
     */
    public function destroy() {
        session()->forget(['email', 'password']);
        return to_route('register.create');
    }
}
