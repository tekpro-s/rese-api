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
        $shops = Shop::all();

        foreach($shops as $shop){
            //$shop->area;
            //$shop->genre;
            //$shop->likes;
        }

        if ($shops) {
            return response()->json([
                //'message' => 'Shops got successfully',
                'data' => $shops
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
    
    public function get($shop_id)
    {
        $shop = Shop::find($shop_id);
        $shop->area;
        $shop->genre;
        $shop->likes;

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
