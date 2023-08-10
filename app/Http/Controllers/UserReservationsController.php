<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

class UserReservationsController extends Controller
{
    public function userReservations()
    {
        $padelReservations = Db::Table('padel_reservations')
            ->whereDate('reservation_date', '>=', today())
            ->where('user_id', auth()->user()->id)
            ->get()
            ->toArray();

        $othersReservations = Db::Table('users')
            ->select('activities.name', 'timetables.start', 'timetables.finish', 'timetables.dayOfTheWeek', 'reservations.reservationDay', 'reservations.id')
            ->join('reservations', 'reservations.user_id', '=', 'users.id')
            ->join('timetables', 'timetables.id', '=', 'reservations.timetable_id')
            ->join('activities', 'activities.id', '=', 'timetables.activity_id')
            ->where('users.id', auth()->user()->id)
            ->whereDate('reservations.reservationDay', '>=', today())
            ->get();

        return view('reservations.userReservations', compact('padelReservations', 'othersReservations'));
    }

    public function deletePadel($matchdate)
    {
        Db::Table('padel_reservations')
            ->where('reservation_date', $matchdate)
            ->where('user_id', auth()->user()->id)
            ->delete();

        echo "<script>";
        echo "alert('La plaza se ha cancelado con éxito');";
        echo "</script>";

        $padelReservations = Db::Table('padel_reservations')
            ->whereDate('reservation_date', '>=', today())
            ->where('user_id', auth()->user()->id)
            ->get()
            ->toArray();

        return redirect('userReservations')
            ->with('padelReservations', $padelReservations);
    }
}
