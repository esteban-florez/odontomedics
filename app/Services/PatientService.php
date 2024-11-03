<?php

namespace App\Services;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientService
{
    public static function create(Request $request, $credentials) {
        $user = User::create($credentials);

        $data = $request->safe()->except(['code', 'email', 'password']);
        $code = $request->safe()->input('code');
        $data['phone'] = $code . $data['phone'];
        $data['user_id'] = $user->id;

        $patient = Patient::create($data);

        return [
            'user' => $user,
            'patient' => $patient,
        ];
    }
}
