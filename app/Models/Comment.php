<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'shop_id', 'content', 'evaluation'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public static function comment($request, $shop_id)
    {
        $param = [
            "shop_id" => $shop_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "evaluation" => $request->evaluation,
        ];
        $comment = Comment::create($param);

        return $comment;
    }

    public static function comment_put($request, $shop_id)
    {
        $param = [
            "content" => $request->content,
            "evaluation" => $request->evaluation,
        ];
        $comment = Comment::where('id', '=', $request->comment_id)->where('shop_id', $shop_id)->update($param);

        return $comment;
    }
}
