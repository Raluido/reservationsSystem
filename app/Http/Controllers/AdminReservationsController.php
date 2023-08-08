<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Log;

class AdminReservationsController extends Controller
{
    public function usersReservations()
    {
        $padelReservations = Db::Table('padel_reservations')
            ->join('users', 'padel_reservations.user_id', '=', 'users.id')
            ->select('padel_reservations.*', 'users.name')
            ->whereDate('reservation_date', '>=', today())
            ->get();
        $reservations = Db::Table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('timetables', 'reservations.timetable_id', '=', 'timetables.id')
            ->join('activities', 'timetables.activity_id', '=', 'activities.id')
            ->select('users.name AS user', 'activities.name', 'timetables.start', 'reservations.id', 'reservations.reservationDay')
            ->whereDate('reservations.reservationDay', '>=', today())
            ->get();

        return view('reservations.adminReservations', compact('padelReservations', 'reservations'));
    }

    public function destroyPadel($idPadelReservation)
    {
        Db::Table('padel_reservations')
            ->where('idPadelReservation', $idPadelReservation)
            ->delete();

        return redirect()
            ->route('reservations.adminReservations')
            ->withSuccess('Se ha eliminado correctamente la reserva.');
    }
}
