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
        $yogaReservations = Db::Table('yoga_reservations')
            ->join('users', 'yoga_reservations.user_id', '=', 'users.id')
            ->select('yoga_reservations.*', 'users.name')
            ->whereDate('reservation_date', '>=', today())
            ->get();

        return view('reservations.adminReservations')
            ->with('padelReservations', $padelReservations)
            ->with('yogaReservations', $yogaReservations);
    }

    public function destroyYoga($idYogaReservation)
    {
        Db::Table('yoga_reservations')->where('idYogaReservation', $idYogaReservation)
            ->delete();

        $padelReservations = Db::Table('padel_reservations')
            ->join('users', 'padel_reservations.user_id', '=', 'users.id')
            ->select('padel_reservations.*', 'users.name')
            ->whereDate('reservation_date', '>=', today())
            ->get();
        $yogaReservations = Db::Table('yoga_reservations')
            ->join('users', 'yoga_reservations.user_id', '=', 'users.id')
            ->select('yoga_reservations.*', 'users.name')
            ->whereDate('reservation_date', '>=', today())
            ->get();

        return view('reservations.adminReservations')
            ->with('padelReservations', $padelReservations)
            ->with('yogaReservations', $yogaReservations);
    }

    public function destroyPadel($idPadelReservation)
    {
        Db::Table('padel_reservations')->where('idPadelReservation', $idPadelReservation)
            ->delete();

        $padelReservations = Db::Table('padel_reservations')
            ->join('users', 'padel_reservations.user_id', '=', 'users.id')
            ->select('padel_reservations.*', 'users.name')
            ->whereDate('reservation_date', '>=', today())
            ->get();
        $yogaReservations = Db::Table('yoga_reservations')
            ->join('users', 'yoga_reservations.user_id', '=', 'users.id')
            ->select('yoga_reservations.*', 'users.name')
            ->whereDate('reservation_date', '>=', today())
            ->get();

        return view('reservations.adminReservations')
            ->with('padelReservations', $padelReservations)
            ->with('yogaReservations', $yogaReservations);
    }
}
