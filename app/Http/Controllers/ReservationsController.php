<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
use App\Models\Reservation;
use Illuminate\Support\Carbon;


class ReservationsController extends Controller
{
    public function index($activityId = null)
    {
        $userId = auth()->user()->id;

        if ($activityId == null) {
            $activityChoose = Db::Table('activities')
                ->limit(1)
                ->get();
        } else {
            $activityChoose = Db::Table('activities')
                ->where('id', $activityId)
                ->get();
        }

        if ($activityChoose->count() == 0) {
            return redirect()
                ->back()
                ->withErrors('No hay más actividades disponibles aún');
        }

        $activityChoose = $activityChoose[0];
        $activityList = Db::Table('activities')
            ->get();
        $checkdatesAr3 = array(null);
        $reservedPlaces = Db::Table('activities')
            ->join('timetables', 'timetables.activity_id', '=', 'activities.id')
            ->join('reservations', 'reservations.timetable_id', '=', 'timetables.id')
            ->select('activities.name', 'reservations.user_id', 'reservations.reservationDay', 'timetables.start', 'timetables.finish')
            ->whereBetween('reservations.reservationDay', [Carbon::now(), Carbon::now()->addDays(15)])
            ->get();

        // We doesnt filter today's timetables already gone

        for ($i = 0; $i <= 14; $i++) {

            $checkdatesAr4 = array();
            $dayOfWeekPlus = date('Y-m-d', strtotime(Carbon::now() . ' +' . $i . 'days'));
            $dayOfWeek = date("N", strtotime($dayOfWeekPlus));
            $timetablesPerDay = Db::Table('timetables')
                ->where('dayOfTheWeek', $dayOfWeek)
                ->where('activity_id', '=', $activityChoose->id)
                ->get();

            foreach ($timetablesPerDay as $index) {

                $checkDay = $dayOfWeekPlus . ' ' . $index->start;
                $hour = $index->start;
                $timetableId = $index->id;

                // Total amount of Reservations by others

                $hourR = Db::Table('timetables')
                    ->join('reservations', 'timetables.id', '=', 'reservations.timetable_id')
                    ->where('timetables.dayOfTheWeek', '=', $dayOfWeek)
                    ->where('timetables.activity_id', '=', $activityChoose->id)
                    ->where('timetables.start', '=', $hour)
                    ->where('reservations.reservationDay', '=', $dayOfWeekPlus)
                    ->where('reservations.user_id', '!=', $userId)
                    ->get()
                    ->count();

                // Reserved by auth user, 0 or 1

                $hourRU = Db::Table('timetables')
                    ->join('reservations', 'timetables.id', '=', 'reservations.timetable_id')
                    ->where('timetables.dayOfTheWeek', '=', $dayOfWeek)
                    ->where('timetables.activity_id', '=', $activityChoose->id)
                    ->where('timetables.start', '=', $hour)
                    ->where('reservations.reservationDay', '=', $dayOfWeekPlus)
                    ->where('reservations.user_id', '=', $userId)
                    ->get()
                    ->count();

                $checkedDates = [$checkDay, $hourR, $hourRU, $hour, $dayOfWeekPlus, $timetableId,  $activityChoose->id];

                $checkdatesAr1 = $this->result($checkedDates);

                $arr = array();
                $arr['Hora'] = $hour;
                $arr['Estado'] = $checkdatesAr1[1];
                $arr['Información'] = $checkdatesAr1[0];
                $checkdatesAr4[] = $arr;

                $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;
            }
        }

        $checkdatesAr3 = array_map(
            function ($array) {
                return array((object)$array);
            },
            $checkdatesAr3
        );

        return view('reservations.index', compact('checkdatesAr3', 'activityList', 'activityChoose'));
    }

    public function result($checkedDates)
    {
        $state = "null";

        $reservationId = Db::Table('timetables')
            ->join('reservations', 'timetables.id', '=', 'reservations.timetable_id')
            ->where('timetables.start', '=', $checkedDates[3])
            ->where('reservations.reservationDay', '=', $checkedDates[4])
            ->where('reservations.user_id', '=', auth()->user()->id)
            ->select('reservations.id')
            ->value('id');

        $places = Db::Table('activities')
            ->where('id', '=', $checkedDates[6])
            ->value('places');

        if ($checkedDates[2] == 1) {
            $checkdatesAr = "<div class='border py-3 mt-3 ps-3 pe-3'><p>Ya has reservado para ésta hora, quieres cancelar? " . "</p>" . "<div class='d-flex justify-content-center'><div><button class='ms-3'><a class='text-dark text-decoration-none' href=" . url('/reservations/cancel/' . $reservationId) . ">Cancelar</a></button></div></div></div>";
            $state = "Reservado";
        } else if ($checkedDates[1] == 0) {
            $checkdatesAr = "<div class='border py-3 mt-3 ps-3 pe-3'><p>Hay plazas ésta hora, quieres reservar?" . "</p>" . "<form method='POST' action='/reservations/reserve' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDay' value='$checkedDates[4]'>
            <input type='hidden' name='timetableId' value='$checkedDates[5]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
            $state = "Hay plazas";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 9 && $checkedDates[2] == 0) {
            $checkdatesAr = "<div class='border py-3 mt-3 ps-3 pe-3'><p>Quedan " . ($places - $checkedDates[1]) . " plazas, quieres reservar?"  . "</p>" . "<form method='POST' action='/reservations/reserve' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDay' value='$checkedDates[4]'>
            <input type='hidden' name='timetableId' value='$checkedDates[5]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
            $state = "Hay plazas";
        } else if ($checkedDates[1] == $places) {
            $checkdatesAr = "<div class='border py-3 mt-3 ps-3 pe-3'><p>Todas las plazas están ocupadas, losiento</p></div>";
            $state = "Sin plazas";
        }

        return [$checkdatesAr, $state];
    }

    public function reserve(Request $request)
    {
        if (
            Db::Table('reservations')
            ->where('reservationDay', $request->input('reservationDay'))
            ->where('user_id', auth()->user()->id)
            ->where('timetable_id', $request->input(''))
            ->get()
            ->count() == 0
        ) {

            $reservation = new Reservation();
            $reservation->user_id = auth()->user()->id;
            $reservation->timetable_id = $request->input('timetableId');
            $reservation->reservationDay = $request->input('reservationDay');
            $reservation->save();

            echo "<script>";
            echo "alert('La plaza se ha reservado con éxito');";
            echo "</script>";
        } else {

            echo "<script>";
            echo "alert('Ya tienes hecha una reserva para ése día');";
            echo "</script>";
        }

        $checkdatesAr3 = null;

        return redirect()->back()->with('checkdatesAr3');
    }

    public function cancel($reservationId)
    {
        Db::Table('reservations')
            ->where('id', $reservationId)
            ->delete();

        echo "<script>";
        echo "alert('La plaza se ha cancelado con éxito');";
        echo "</script>";

        $checkdatesAr3 = null;

        return redirect()->back()->with('checkdatesAr3');
    }
}
