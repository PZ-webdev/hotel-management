<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $fillable = ['id_room'];

    public function rating()
    {
        return $this->hasMany(Rating::class, 'id_room', 'id');
    }


    private function reservation($room)
    {
        return Reservation::select('date_end')
        ->where('id_room', $room->id)
        ->whereDate('date_start', '<=', date("Y-m-d"))
        ->whereDate('date_end', '>=', date("Y-m-d"))
        ->orderBy('date_end', 'desc')
        ->first();
    }

    public function isEmpty($room): bool
    {
        $date_end = $this->reservation($room)->date_end ?? null;
        if($date_end > now()){
            return true;
        }else{
            return false;
        }
    }
}
