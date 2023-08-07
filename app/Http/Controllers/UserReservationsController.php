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

        $yogaReservations = Db::Table('yoga_reservations')
            ->whereDate('reservation_date', '>=', today())
            ->where('user_id', auth()->user()->id)
            ->get()
            ->toArray();

        return view('reservations.userReservations')
            ->with('padelReservations', $padelReservations)
            ->with('yogaReservations', $yogaReservations);
    }

    public function deleteYoga($matchdate)
    {
        Db::Table('yoga_reservations')
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

        $yogaReservations = Db::Table('yoga_reservations')
            ->whereDate('reservation_date', '>=', today())
            ->where('user_id', auth()->user()->id)
            ->get()
            ->toArray();

        return redirect('userReservations')
            ->with('padelReservations', $padelReservations)
            ->with('yogaReservations', $yogaReservations);
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

        $yogaReservations = Db::Table('yoga_reservations')
            ->whereDate('reservation_date', '>=', today())
            ->where('user_id', auth()->user()->id)
            ->get()
            ->toArray();

        return redirect('userReservations')
            ->with('padelReservations', $padelReservations)
            ->with('yogaReservations', $yogaReservations);
    }
}
