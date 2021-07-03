<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function get($user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            return response()->json([
                'message' => 'User got successfully',
                'data' => $user
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
}
