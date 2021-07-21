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
        $shop = Shop::with(['area','genre','likes','comments' => function ($query) {
            $query->orderBy('comments.created_at', 'desc');
            $query->with('user:id,name');
        }])->where('id', $shop_id)->first();

        //$comment = User::with('comments')->get();
        //$comment = Comment::with('users')->where('id', $shop_id)->get();

        // $comment = DB::table('comments')->where('shop_id', $shop->id)->get();
        // $comment_data = array();
        // foreach ($comment as $value) {
        //     $comment_user = DB::table('users')->where('id', $value->user_id)->first();
        //     $comments = [
        //         "comment" => $value,
        //         "comment_user" => $comment_user
        //     ];
        //     array_push($comment_data, $comments);
        // }

        // $shop = Shop::with('area','genre','likes','comments')->where('id', $shop_id)->get();
        // $shop = $shop->sortByDesc('comments.created_at')->values();

        // $items = [
        //     "data" => $shop,
        //     "comments" => $comment_data,
        // ];

        if ($shop) {
            return response()->json([
                'message' => 'Shop got successfully',
                'data' => $shop,
                // 'comment' => $comment_data
            ], 200);
        } else {
            return response()->json(['status' => 'not found'], 404);
        }
    }
}
