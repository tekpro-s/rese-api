<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationStoreRequest;

class ReservationsController extends Controller
{
    public function get($user_id)
    {
        $reservations = Reservation::with('shop')->where('user_id', $user_id)->get();

        if ($reservations) {
            return response()->json([
                'message' => 'Reservation got successfully',
                'data' => $reservations
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }

    public function post(ReservationStoreRequest $request, $shop_id)
    {
        $reservation = Reservation::reservation($request, $shop_id);
        return response()->json([
            'message' => 'Reservation created successfully',
            'data' => $reservation
        ], 201);
    }

    public function put(ReservationStoreRequest $request, $shop_id)
    {
        $reservation = Reservation::reservation_put($request, $shop_id);
        return response()->json([
            'message' => 'Reservation updated successfully',
            'data' => $reservation
        ], 201);
    }
    
    public function delete(Request $request, $shop_id)
    {
        Reservation::where('id', $request->reservation_id)->where('shop_id', $shop_id)->delete();
        return response()->json([
            'message' => 'Reservation deleted successfully',
        ], 200);
    }
}
