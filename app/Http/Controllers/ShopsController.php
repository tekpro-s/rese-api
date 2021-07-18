<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    public function index()
    {
        //$shops = Shop::all();
        $shops = Shop::with('area','genre','likes')->get();

        if ($shops) {
            return response()->json([
                'message' => 'Shops got successfully',
                'data' => $shops
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
    
    public function get($shop_id)
    {
        $shop = Shop::with('area','genre','likes')->where('id', $shop_id)->first();

        if ($shop) {
            return response()->json([
                'message' => 'Shop got successfully',
                'data' => $shop,
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
}
