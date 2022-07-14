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
        $result = " ";

        return view('reservations.indexPadel');
    }

    public function getcheckdate($checkdate)
    {
        $dayOfWeek = date("N", strtotime($checkdate));

        switch ($dayOfWeek) {
            case 1:
                $mon1 = $checkdate . ' ' . '11:15:00';
                $level1 = Db::Table('padel_reservations')->where('reservation_date', $mon1)->value('match_level');
                $mon1R = Db::Table('padel_reservations')->where('reservation_date', $mon1)->get()->count();
                $mon1RU = Db::Table('padel_reservations')->where('reservation_date', $mon1)->where('user_id', auth()->user()->id)->get()->count();
                $mon2 = $checkdate . ' ' . '18:30:00';
                $level2 = Db::Table('padel_reservations')->where('reservation_date', $mon2)->value('match_level');
                $mon2R = Db::Table('padel_reservations')->where('reservation_date', $mon2)->get()->count();
                $mon2RU = Db::Table('padel_reservations')->where('reservation_date', $mon2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$mon1, $mon1R, $mon1RU, $level1];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$mon2, $mon2R, $mon2RU, $level2];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 2:
                $tue1 = $checkdate . ' ' . '10:15:00';
                $level1 = Db::Table('padel_reservations')->where('reservation_date', $tue1)->value('match_level');
                $tue1R = Db::Table('padel_reservations')->where('reservation_date', $tue1)->get()->count();
                $tue1RU = Db::Table('padel_reservations')->where('reservation_date', $tue1)->where('user_id', auth()->user()->id)->get()->count();
                $tue2 = $checkdate . ' ' . '19:00:00';
                $level2 = Db::Table('padel_reservations')->where('reservation_date', $tue2)->value('match_level');
                $tue2R = Db::Table('padel_reservations')->where('reservation_date', $tue2)->get()->count();
                $tue2RU = Db::Table('padel_reservations')->where('reservation_date', $tue2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$tue1, $tue1R, $tue1RU, $level1];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$tue2, $tue2R, $tue2RU, $level2];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 3:
                $wed1 = $checkdate . ' ' . '10:15:00';
                $level1 = Db::Table('padel_reservations')->where('reservation_date', $wed1)->value('match_level');
                $wed1R = Db::Table('padel_reservations')->where('reservation_date', $wed1)->get()->count();
                $wed1RU = Db::Table('padel_reservations')->where('reservation_date', $wed1)->where('user_id', auth()->user()->id)->get()->count();
                $wed2 = $checkdate . ' ' . '19:00:00';
                $level2 = Db::Table('padel_reservations')->where('reservation_date', $wed2)->value('match_level');
                $wed2R = Db::Table('padel_reservations')->where('reservation_date', $wed2)->get()->count();
                $wed2RU = Db::Table('padel_reservations')->where('reservation_date', $wed2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$wed1, $wed1R, $wed1RU, $level1];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$wed2, $wed2R, $wed2RU, $level2];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 4:

                $thu1 = $checkdate . ' ' . '10:15:00';
                $level1 = Db::Table('padel_reservations')->where('reservation_date', $thu1)->value('match_level');
                $thu1R = Db::Table('padel_reservations')->where('reservation_date', $thu1)->get()->count();
                $thu1RU = Db::Table('padel_reservations')->where('reservation_date', $thu1)->where('user_id', auth()->user()->id)->get()->count();
                $thu2 = $checkdate . ' ' . '19:00:00';
                $level2 = Db::Table('padel_reservations')->where('reservation_date', $thu2)->value('match_level');
                $thu2R = Db::Table('padel_reservations')->where('reservation_date', $thu2)->get()->count();
                $thu2RU = Db::Table('padel_reservations')->where('reservation_date', $thu2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$thu1, $thu1R, $thu1RU, $level1];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$thu2, $thu2R, $thu2RU, $level2];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 5:

                $fri1 = $checkdate . ' ' . '10:15:00';
                $level1 = Db::Table('padel_reservations')->where('reservation_date', $fri1)->value('match_level');
                $fri1R = Db::Table('padel_reservations')->where('reservation_date', $fri1)->get()->count();
                $fri1RU = Db::Table('padel_reservations')->where('reservation_date', $fri1)->where('user_id', auth()->user()->id)->get()->count();
                $fri2 = $checkdate . ' ' . '19:00:00';
                $level2 = Db::Table('padel_reservations')->where('reservation_date', $fri2)->value('match_level');
                $fri2R = Db::Table('padel_reservations')->where('reservation_date', $fri2)->get()->count();
                $fri2RU = Db::Table('padel_reservations')->where('reservation_date', $fri2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$fri1, $fri1R, $fri1RU, $level1];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$fri2, $fri2R, $fri2RU, $level2];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
        }
    }

    public function result($checkedDates)
    {
        if ($checkedDates[1] == 0) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>No hay partidos creados a el " . $checkedDates[0] .
                "<form method='POST' action='/padelReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <input type='hidden' name='newMatch' value='0'>
            <input type='hidden' name='matchLevel' value='$checkedDates[3]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 3 && $checkedDates[2] == 0 && Db::Table('users')->where('id', auth()->user()->id)->value('padelLevel') == $checkedDates[3]) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Hay un partido creado y aún quedan " . (4 - $checkedDates[1]) .
                "<form method='POST' action='/padelReservations' enctype='multipart/form-data'>
                <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <input type='hidden' name='newMatch' value='1'>
            <input type='hidden' name='matchLevel' value='$checkedDates[3]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 3 && $checkedDates[2] == 0 && Db::Table('users')->where('id', auth()->user()->id)->value('padelLevel') != $checkedDates[3]) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Hay un partido creado, quedan " . (4 - $checkedDates[1]) . " plazas, pero tu nivel es muy alto o muy bajo</p></div>";
        } else if ($checkedDates[2] == 1) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Ya tienes tu plaza reservada para el " . $checkedDates[0] . "</p>" .
                "<div class='d-flex justify-content-center'><div><button class='ms-3'><a class='text-dark text-decoration-none' href='" . url('padelReservations/deletematch/' . $checkedDates[0]) . "'>Cancelar</a></button></div></div></div>";
        } else if ($checkedDates[1] == 4) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Hay un partido creado y ya no quedan plazas</p></div>";
        }

        return [$checkedDates[0], $checkdatesAr];
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
