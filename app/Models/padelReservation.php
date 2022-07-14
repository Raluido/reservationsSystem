<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padelReservation extends Model
{
    use HasFactory;

    protected $table = 'padel_reservations';

    protected $fillable = [
        'user_id',
        'reservation_date',
    ];
}
