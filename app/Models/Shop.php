<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area_id', 'genre_id', 'summary', 'image_url'];

    public function area() 
    {
        return $this->belongsTo(Area::class);
    }

    public function genre() 
    {
        return $this->belongsTo(Genre::class);
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public static function shop($request)
    {
        $param = [
            "name" => $request->name,
            "area_id" => $request->area_id,
            "genre_id" => $request->genre_id,
            "summary" => $request->summary,
            "image_url" => $request->image_url,
        ];
        $shop = Shop::create($param);
        return $shop;
    }

    public static function shop_put($request, $id)
    {
        $param = [
            "name" => $request->name,
            "area_id" => $request->area_id,
            "genre_id" => $request->genre_id,
            "summary" => $request->summary,
            "image_url" => $request->image_url,
        ];
        $shop = Shop::where('id', '=', $id)->update($param);
        return $shop;
    }
}
