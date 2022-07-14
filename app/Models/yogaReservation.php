<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yogaReservation extends Model
{
    use HasFactory;

    protected $table = 'yoga_reservations';

    protected $fillable = [
        'user_id',
        'reservation_date',
    ];
}
