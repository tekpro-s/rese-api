<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function post(Request $request, $shop_id)
    {
        $comment = Comment::comment($request, $shop_id);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $comment
        ], 201);
    }
}
