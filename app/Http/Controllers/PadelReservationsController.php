<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use DB;
use App\Models\padelReservation;

class PadelReservationsController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $today = today();

        $range = date('Y-m-d', strtotime(today() . ' + 15 days')) . ' 00:00:00';
        $reservedPlaces = Db::Table('padel_reservations')
            ->whereBetween('reservation_date', [$today, $range])
            ->get();

        $checkdatesAr3 = array(null);

        for ($i = 0; $i <= 14; $i++) {

            $dayOfWeekPlus = date('Y-m-d', strtotime($today . ' +' . $i . 'days'));
            $dayOfWeek = date("N", strtotime($dayOfWeekPlus));

            switch ($dayOfWeek) {
                case 1:

                    $checkDay0 = $dayOfWeekPlus . ' 11:15:00';
                    $hours1 = '11:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;


                    $checkDay1 = $dayOfWeekPlus . ' 18:30:00';
                    $hours2 = '18:30:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 2:

                    $checkDay0 = $dayOfWeekPlus . ' 10:15:00';
                    $hours1 = '10:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay1 = $dayOfWeekPlus . ' 19:00:00';
                    $hours2 = '19:00:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 3:
                    $checkDay0 = $dayOfWeekPlus . ' 10:15:00';
                    $hours1 = '10:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay1 = $dayOfWeekPlus . ' 19:00:00';
                    $hours2 = '19:00:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 4:
                    $checkDay0 = $dayOfWeekPlus . ' 10:15:00';
                    $hours1 = '10:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay1 = $dayOfWeekPlus . ' 19:00:00';
                    $hours2 = '19:00:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;
                    $checkdatesAr3[$dayOfWeekPlus] = $checkdatesAr4;

                    break;
                case 5:
                    $checkDay0 = $dayOfWeekPlus . ' 11:15:00';
                    $hours1 = '11:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    $checkdatesAr4 = array();
                    $arr = array();
                    $arr['Hora'] = $hours1;
                    $arr['Estado'] = $checkdatesAr1[1];
                    $arr['Información'] = $checkdatesAr1[0];
                    $checkdatesAr4[] = $arr;

                    $checkDay1 = $dayOfWeekPlus . ' 18:30:00';
                    $hours2 = '18:30:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

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


        return view('reservations.indexPadel', compact('checkdatesAr3'));
    }

    public function result($checkedDates)
    {

        $state = "null";

        if ($checkedDates[2] == 1) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3 mt-3'><p>Ya has reservado para ésta hora, quieres cancelar? " . "</p>" . "<div class='d-flex justify-content-center'><div><button class='ms-3'><a class='text-dark text-decoration-none' href='" . url('padelReservations/deletematch/' . $checkedDates[0]) . "'>Cancelar</a></button></div></div></div>";
            $state = "Reservado";
        } else if ($checkedDates[1] == 0) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3 mt-3'><p>No hay partidos reservados partidos a ésta hora. Quieres reservar" . "</p>" . "<form method='POST' action='/padelReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <input type='hidden' name='newMatch' value='0'>
            <input type='hidden' name='matchLevel' value='$checkedDates[3]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
            $state = "Hay plazas";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 3 && $checkedDates[2] == 0 && Db::Table('users')->where('id', auth()->user()->id)->value('padel_level') == $checkedDates[3]) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3 mt-3'><p>Hay un partido reservado pero quedan " . (4 - $checkedDates[1]) . " plazas. Quieres reservar"  . "</p>" . "<form method='POST' action='/padelReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <input type='hidden' name='newMatch' value='0'>
            <input type='hidden' name='matchLevel' value='$checkedDates[3]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
            $state = "Hay plazas";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 3 && $checkedDates[2] == 0 && Db::Table('users')->where('id', auth()->user()->id)->value('padel_level') != $checkedDates[3]) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3 mt-3'><p>Aún quedan plazas para éste partido pero no tienes el nivel para participar</p></div>";
            $state = "Sin plazas";
        } else if ($checkedDates[1] == 4) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3 mt-3'><p>Todas las plazas están ocupadas, losiento</p></div>";
            $state = "Sin plazas";
        }

        return [$checkdatesAr, $state];
    }


    public function creatematch(Request $request)
    {
        if (
            Db::Table('padel_reservations')
            ->where('reservation_date', $request->input('reservationDate'))
            ->where('user_id', auth()->user()->id)
            ->get()
            ->count() == 0
        ) {

            $padelReservation = new PadelReservation();
            $padelReservation->user_id = auth()->user()->id;
            if ($request->input('newMatch') == 0) {
                $padelReservation->match_level = Db::Table('users')->where('id', auth()->user()->id)->value('padel_level');
            } else {
                $padelReservation->match_level = $request->input('matchLevel');
            }
            $padelReservation->reservation_date = $request->input('reservationDate');
            $padelReservation->save();

            echo "<script>";
            echo "alert('La plaza se ha reservado con éxito');";
            echo "</script>";
        } else {

            echo "<script>";
            echo "alert('Ya tienes hecha una reserva para éte día');";
            echo "</script>";
        }

        $checkdatesAr3 = null;

        return redirect()->back()->with('checkdatesAr3');
    }

    public function deletematch($matchdate)
    {
        Db::Table('padel_reservations')->where('reservation_date', $matchdate)->where('user_id', auth()->user()->id)->delete();

        echo "<script>";
        echo "alert('La plaza se ha cancelado con éxito');";
        echo "</script>";

        $checkdatesAr3 = array(null);

        return redirect()->back()->with('checkdatesAr3');
    }
}
