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
        $validated = $request->validate([
            'user_id' => ['required', 'numeric'],
            'date' => ['required'],
            'time' => ['required'],
            'number' => ['required', 'numeric'],
        ]);

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

    public static function reservation_put($request, $id)
    {
        
        $param = [
            "id" => $id,
            "date" => $request->date,
            "time" => $request->time,
            "number" => $request->number,
        ];
        $reservation = Reservation::where('id', '=', $id)->update($param);
        return $reservation;
    }
}
