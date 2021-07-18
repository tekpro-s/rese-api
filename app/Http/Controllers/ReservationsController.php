<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function get($user_id)
    {
        $reservations = Reservation::where('user_id', $user_id)->get();

        foreach($reservations as $reservation){
            $reservation->shop;
        }

        if ($reservations) {
            return response()->json([
                'message' => 'Reservation got successfully',
                'data' => $reservations
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }

    public function post(Request $request, $shop_id)
    {
        $reservation = Reservation::reservation($request, $shop_id);
        return response()->json([
            'message' => 'Reservation created successfully',
            'data' => $reservation
        ], 201);
    }

    public function put(Request $request, $id)
    {
        $reservation = Reservation::reservation_put($request, $id);
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
