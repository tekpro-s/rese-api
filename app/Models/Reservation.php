<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Reservation as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id', 'date', 'time', 'number'];
    
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
}
