<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function index()
    {
        $likes = Like::all();

        if ($likes) {
            return response()->json([
                'message' => 'Likes got successfully',
                'data' => $likes
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
    public function get($user_id)
    {
        $likes = Like::where('user_id', $user_id)->get();
        if ($likes) {
            return response()->json([
                'message' => 'OK',
                'data' => $likes
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
    public function put(Request $request, $shop_id)
    {
        $like = Like::like($request, $shop_id);
        return response()->json([
            'message' => 'Like created successfully',
            'data' => $like
        ], 201);
    }
    public function delete(Request $request, $shop_id)
    {
        Like::where('shop_id', $shop_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully',
        ], 200);
    }
}
