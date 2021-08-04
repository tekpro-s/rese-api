<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\ShopStoreRequest;

class ShopsController extends Controller
{
    public function index()
    {
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
        $shop = Shop::with(['area','genre','likes','comments' => function ($query) {
            $query->orderBy('comments.created_at', 'desc');
            $query->with('user:id,name');
        }])->where('id', $shop_id)->first();

        if ($shop) {
            return response()->json([
                'message' => 'Shop got successfully',
                'data' => $shop,
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }

    public function post(ShopStoreRequest $request)
    {
        $shop = Shop::shop($request);
        return response()->json([
            'message' => 'Shop created successfully',
            'data' => $shop
        ], 201);
    }

    public function put(ShopStoreRequest $request, $id)
    {
        $shop = Shop::shop_put($request, $id);
        return response()->json([
            'message' => 'Shop updated successfully',
            'data' => $shop
        ], 201);
    }
    
    public function delete(Request $request, $id)
    {
        Shop::where('id', $id)->delete();
        return response()->json([
            'message' => 'Shop deleted successfully',
        ], 200);
    }
}
