<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use DB;
use App\Models\yogaReservation;

class YogaReservationsController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $today = today();

        $range = date('Y-m-d', strtotime(today() . ' + 15 days')) . ' 00:00:00';
        $reservedPlaces = Db::Table('yoga_reservations')->whereBetween('reservation_date', [$today, $range])->get();

        $checkdatesAr3 = array(null);

        for ($i = 0; $i <= 14; $i++) {

            $dayOfWeekPlus = date('Y-m-d', strtotime($today . ' +' . $i . 'days'));
            $dayOfWeek = date("N", strtotime($dayOfWeekPlus));

            switch ($dayOfWeek) {
                case 1:

                    $timetable = Db::Table('activities')->where('dayOfTheWeek', 1)->get();

                    if ($timetable != null) {

                        foreach ($timetable as $index) {

                            $checkDay0 = $dayOfWeekPlus . ' ' . $index->time;
                            $hours1 = $index->time;
                            $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                            $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                            $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                            $checkdatesAr1 = $this->result($checkedDates);

                            $checkdatesAr4 = array();
                            $arr = array();
                            $arr['Hora'] = $hours1;
                            $arr['Estado'] = $checkdatesAr1[1];
                            $arr['Información'] = $checkdatesAr1[0];
                            $checkdatesAr4[] = $arr;
                        }
                    }

                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 2:

                    $checkDay0 = $dayOfWeekPlus . ' 09:15:00';
                    $hours1 = '09:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay0 = $dayOfWeekPlus . ' 18:15:00';
                    $hours1 = '18:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 3:
                    $checkDay0 = $dayOfWeekPlus . ' 08:15:00';
                    $hours1 = '08:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay0 = $dayOfWeekPlus . ' 20:15:00';
                    $hours1 = '20:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 4:
                    $checkDay0 = $dayOfWeekPlus . ' 12:15:00';
                    $hours1 = '12:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay0 = $dayOfWeekPlus . ' 21:15:00';
                    $hours1 = '21:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 5:

                    $checkDay0 = $dayOfWeekPlus . ' 13:15:00';
                    $hours1 = '13:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay0 = $dayOfWeekPlus . ' 19:15:00';
                    $hours1 = '19:15:00';
                    $hour1R = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('yoga_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
            }
        }

        $checkdatesAr3 = array_map(function ($array) {
            return array((object)$array);
        }, $checkdatesAr3);

        return view('reservations.indexYoga', compact('checkdatesAr3'));
    }

    public function result($checkedDates)
    {
        $state = "null";

        if ($checkedDates[2] == 1) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Ya has reservado para ésta hora, quieres cancelar? " . "</p>" . "<div class='d-flex justify-content-center'><div><button class='ms-3'><a class='text-dark text-decoration-none' href='" . url('yogaReservations/cancelclasses/' . $checkedDates[0]) . "'>Cancelar</a></button></div></div></div>";
            $state = "Reservado";
        } else if ($checkedDates[1] == 0) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Hay plazas ésta hora, quieres reservar?" . "</p>" . "<form method='POST' action='/yogaReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
            $state = "Hay plazas";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 9 && $checkedDates[2] == 0) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Quedan " . (10 - $checkedDates[1]) . " plazas, quieres reservar?"  . "</p>" . "<form method='POST' action='/yogaReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
            $state = "Hay plazas";
        } else if ($checkedDates[1] == 10) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Todas las plazas están ocupadas, losiento</p></div>";
            $state = "Sin plazas";
        }

        return [$checkdatesAr, $state];
    }

    public function bookclasses(Request $request)
    {
        if (
            Db::Table('yoga_reservations')
            ->where('reservation_date', $request->input('reservationDate'))
            ->where('user_id', auth()->user()->id)
            ->get()
            ->count() == 0
        ) {

            $yogaReservation = new yogaReservation();
            $yogaReservation->user_id = auth()->user()->id;
            $yogaReservation->reservation_date = $request->input('reservationDate');
            $yogaReservation->save();

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

    public function cancelclasses($matchdate)
    {
        Db::Table('yoga_reservations')->where('reservation_date', $matchdate)->where('user_id', auth()->user()->id)->delete();

        echo "<script>";
        echo "alert('La plaza se ha cancelado con éxito');";
        echo "</script>";

        $checkdatesAr3 = null;

        return redirect()->back()->with('checkdatesAr3');
    }
}
