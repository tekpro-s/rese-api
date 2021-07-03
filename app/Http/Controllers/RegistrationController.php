<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function post(Request $request)
    {
        $user = User::registration($request);
        return response()->json([
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }
}
