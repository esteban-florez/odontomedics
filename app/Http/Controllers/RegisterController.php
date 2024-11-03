<?php

namespace App\Http\Controllers;

use App\Enums\Code;
use App\Enums\Gender;
use App\Http\Requests\RegisterRequest;
use App\Models\Patient;
use App\Models\User;
use App\Services\PatientService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register', [
            'onboarding' => $this->isOnboardingRequest(),
            'genders' => Gender::values(),
            'codes' => Code::values(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $credentials = session()->only(['email', 'password']);

        ['user' => $user] = PatientService::create($request, $credentials);

        Auth::login($user);

        session()->forget(['email', 'password']);
        session()->regenerate();

        return to_route('home');
    }

    private function isOnboardingRequest() {
        return session()->has(['email', 'password']);
    }
}
