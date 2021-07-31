<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistrationStoreRequest;

class RegistrationController extends Controller
{
    public function post(RegistrationStoreRequest $request)
    {
        $user = User::registration($request);
        return response()->json([
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
