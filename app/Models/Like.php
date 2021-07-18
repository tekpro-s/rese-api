<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'shop_id'];

    public function shop() 
    {
        return $this->belongsTo(Shop::class);
    }

    public static function like($request, $shop_id)
    {
       
        $param = [
            "shop_id" => $shop_id,
            "user_id" => $request->user_id,
        ];
        $like = Like::create($param);
        return $like;
    }
}
