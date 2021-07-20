<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'shop_id', 'content', 'evaluation'];

    public static function comment($request, $shop_id)
    {
        //  Log::debug($request);
        $param = [
            "shop_id" => $shop_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "evaluation" => $request->evaluation,
        ];
        $comment = Comment::create($param);
        return $comment;
    }
}
