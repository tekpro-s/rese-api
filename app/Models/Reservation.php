<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Reservation as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id', 'date', 'time', 'number', 'name'];
    
    public function shop() 
    {
        return $this->belongsTo(Shop::class);
    }

    public static function reservation($request, $shop_id)
    {
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $shop_id,
            "date" => $request->date,
            "time" => $request->time,
            "number" => $request->number,
        ];
        $reservation = Reservation::create($param);
        return $reservation;
    }

    public static function reservation_put($request, $shop_id)
    {
        $param = [
            "id" => $request->reservation_id,
            "date" => $request->date,
            "time" => $request->time,
            "number" => $request->number,
        ];
        $reservation = Reservation::where('id', '=', $request->reservation_id)->where('shop_id', $shop_id)->update($param);
        return $reservation;
    }
}
