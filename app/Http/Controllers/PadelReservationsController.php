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
        $reservedPlaces = Db::Table('padel_reservations')->whereBetween('reservation_date', [$today, $range])->get();

        $checkdatesAr3 = array();
        $checkdatesAr4 = array();

        for ($i = 0; $i <= 14; $i++) {

            $dayOfWeekPlus = date('Y-m-d', strtotime($today . ' +' . $i . 'days'));
            $dayOfWeek = date("N", strtotime($dayOfWeekPlus));

            switch ($dayOfWeek) {
                case 1:

                    $checkDay0 = $dayOfWeekPlus . ' 11:15:00';
                    $hours = '11:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr1);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);


                    $checkDay1 = $dayOfWeekPlus . ' 18:30:00';
                    $hours = '18:30:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr2);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    break;
                case 2:

                    $checkDay0 = $dayOfWeekPlus . ' 10:15:00';
                    $hours = '10:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr1);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    $checkDay1 = $dayOfWeekPlus . ' 19:00:00';
                    $hours = '19:00:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr2);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    break;
                case 3:
                    $checkDay0 = $dayOfWeekPlus . ' 10:15:00';
                    $hours = '10:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr1);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    $checkDay1 = $dayOfWeekPlus . ' 19:00:00';
                    $hours = '19:00:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr2);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    break;
                case 4:
                    $checkDay0 = $dayOfWeekPlus . ' 10:15:00';
                    $hours = '10:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr1);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    $checkDay1 = $dayOfWeekPlus . ' 19:00:00';
                    $hours = '19:00:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr2);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    break;
                case 5:
                    $checkDay0 = $dayOfWeekPlus . ' 11:15:00';
                    $hours = '11:15:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay0)->value('match_level');

                    $checkedDates = [$checkDay0, $hour1R, $hour1RU, $level0];

                    $checkdatesAr1 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr1);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    $checkDay1 = $dayOfWeekPlus . ' 18:30:00';
                    $hours = '18:30:00';
                    $hour1R = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->get()->count();
                    $hour1RU = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->where('user_id', auth()->user()->id)->get()->count();
                    $level0 = Db::Table('padel_reservations')->where('reservation_date', $checkDay1)->value('match_level');

                    $checkedDates = [$checkDay1, $hour1R, $hour1RU, $level0];

                    $checkdatesAr2 = $this->result($checkedDates);

                    array_push($checkdatesAr4, $hours, $checkdatesAr2);
                    array_push($checkdatesAr3, $dayOfWeekPlus, $checkdatesAr4);

                    break;
            }
        }

        log::info($checkdatesAr3);

        $checkdatesAr3 = array_map(function ($array) {
                 return array((object)$array);
             }, $checkdatesAr3);


        return view('reservations.indexPadel', compact('checkdatesAr3'));
    }

    public function result($checkedDates)
    {

        if ($checkedDates[2] == 1) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Ya has reservado para ésta hora, quieres cancelar? " . "</p>" . "<div class='d-flex justify-content-center'><div><button class='ms-3'><a class='text-dark text-decoration-none' href='" . url('padelReservations/deletematch/' . $checkedDates[0]) . "'>Cancelar</a></button></div></div></div>";
        } else if ($checkedDates[1] == 0) {
            $checkdatesAr = "No hay partidos reservados partidos a ésta hora. Quieres reservar" . "<form method='POST' action='/padelReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <input type='hidden' name='newMatch' value='0'>
            <input type='hidden' name='matchLevel' value='$checkedDates[3]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 3 && $checkedDates[2] == 0 && Db::Table('users')->where('id', auth()->user()->id)->value('padelLevel') == $checkedDates[3]) {
            $checkdatesAr = "Hay un partido reservado pero quedan " . (4 - $checkedDates[1]) . " plazas. Quieres reservar" . "<form method='POST' action='/padelReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <input type='hidden' name='newMatch' value='0'>
            <input type='hidden' name='matchLevel' value='$checkedDates[3]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 3 && $checkedDates[2] == 0 && Db::Table('users')->where('id', auth()->user()->id)->value('padelLevel') != $checkedDates[3]) {
            $checkdatesAr = "Aún quedan plazas para éste partido pero no tienes el nivel para participar";
        } else if ($checkedDates[1] == 4) {
            $checkdatesAr = "Todas las plazas están ocupadas, losiento";
        }

        return $checkdatesAr;
    }


    public function creatematch(Request $request)
    {
        if (Db::Table('padel_reservations')->where('reservation_date', $request->input('reservationDate'))->where('user_id', auth()->user()->id)->get()->count() == 0) {

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

        return view('reservations.indexPadel');
    }

    public function deletematch($matchdate)
    {
        Db::Table('padel_reservations')->where('reservation_date', $matchdate)->where('user_id', auth()->user()->id)->delete();

        echo "<script>";
        echo "alert('La plaza se ha cancelado con éxito');";
        echo "</script>";

        return view('reservations.indexPadel');
    }
}



        // $cars = array(
        //     "2022-07-20" =>
        //     array("modelo"=>"Volvo", 22, 18),
        //     "2022-07-23" => array("BMW", 15, 13),
        //     "2022-07-22" => array("Saab", 5, 2),
        //     "2022-07-21" => array("Land Rover", 17, 15)
        // );

        // $cars = array_map(function ($array) {
        //     return array((object)$array);
        // }, $cars);

        // log::info($cars);
