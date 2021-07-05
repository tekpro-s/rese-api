<?php

namespace App\Http\Controllers;

use App\Models\Area;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        if ($areas) {
            return response()->json([
                'message' => 'Areas got successfully',
                'data' => $areas
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
}
