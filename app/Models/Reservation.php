<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $fillable = [
        'id_room',
        'first_name',
        'last_name',
        'email',
        'address',
        'city',
        'phone',
        'date_start',
        'date_end',
        'confirm_code',
        'verified_at'
    ];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'id_room');
    }

    public function dateDiffInDays($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400)) + 1;
    }

    public function payment($days, $prices)
    {
        return $days * $prices;
    }

    public function confirm($verified)
    {
        if ($verified != null) {
            echo "<span class='badge bg-success rounded'>Tak</span>";
        } else {
            echo "<span class='badge bg-danger rounded'>Nie</span>";
        }
    }
}
