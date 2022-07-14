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
        $result = " ";

        return view('reservations.indexYoga');
    }

    public function getcheckdate($checkdate)
    {
        $dayOfWeek = date("N", strtotime($checkdate));

        switch ($dayOfWeek) {
            case 1:
                $mon1 = $checkdate . ' ' . '11:15:00';
                $mon1R = Db::Table('yoga_reservations')->where('reservation_date', $mon1)->get()->count();
                $mon1RU = Db::Table('yoga_reservations')->where('reservation_date', $mon1)->where('user_id', auth()->user()->id)->get()->count();
                $mon2 = $checkdate . ' ' . '18:30:00';
                $mon2R = Db::Table('yoga_reservations')->where('reservation_date', $mon2)->get()->count();
                $mon2RU = Db::Table('yoga_reservations')->where('reservation_date', $mon2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$mon1, $mon1R, $mon1RU];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$mon2, $mon2R, $mon2RU];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 2:
                $tue1 = $checkdate . ' ' . '10:15:00';
                $tue1R = Db::Table('yoga_reservations')->where('reservation_date', $tue1)->get()->count();
                $tue1RU = Db::Table('yoga_reservations')->where('reservation_date', $tue1)->where('user_id', auth()->user()->id)->get()->count();
                $tue2 = $checkdate . ' ' . '19:00:00';
                $tue2R = Db::Table('yoga_reservations')->where('reservation_date', $tue2)->get()->count();
                $tue2RU = Db::Table('yoga_reservations')->where('reservation_date', $tue2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$tue1, $tue1R, $tue1RU];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$tue2, $tue2R, $tue2RU];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 3:
                $wed1 = $checkdate . ' ' . '10:15:00';
                $wed1R = Db::Table('yoga_reservations')->where('reservation_date', $wed1)->get()->count();
                $wed1RU = Db::Table('yoga_reservations')->where('reservation_date', $wed1)->where('user_id', auth()->user()->id)->get()->count();
                $wed2 = $checkdate . ' ' . '19:00:00';
                $wed2R = Db::Table('yoga_reservations')->where('reservation_date', $wed2)->get()->count();
                $wed2RU = Db::Table('yoga_reservations')->where('reservation_date', $wed2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$wed1, $wed1R, $wed1RU];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$wed2, $wed2R, $wed2RU];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 4:

                $thu1 = $checkdate . ' ' . '10:15:00';
                $thu1R = Db::Table('yoga_reservations')->where('reservation_date', $thu1)->get()->count();
                $thu1RU = Db::Table('yoga_reservations')->where('reservation_date', $thu1)->where('user_id', auth()->user()->id)->get()->count();
                $thu2 = $checkdate . ' ' . '19:00:00';
                $thu2R = Db::Table('yoga_reservations')->where('reservation_date', $thu2)->get()->count();
                $thu2RU = Db::Table('yoga_reservations')->where('reservation_date', $thu2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$thu1, $thu1R, $thu1RU];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$thu2, $thu2R, $thu2RU];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
            case 5:

                $fri1 = $checkdate . ' ' . '10:15:00';
                $fri1R = Db::Table('yoga_reservations')->where('reservation_date', $fri1)->get()->count();
                $fri1RU = Db::Table('yoga_reservations')->where('reservation_date', $fri1)->where('user_id', auth()->user()->id)->get()->count();
                $fri2 = $checkdate . ' ' . '19:00:00';
                $fri2R = Db::Table('yoga_reservations')->where('reservation_date', $fri2)->get()->count();
                $fri2RU = Db::Table('yoga_reservations')->where('reservation_date', $fri2)->where('user_id', auth()->user()->id)->get()->count();

                $checkedDates = [$fri1, $fri1R, $fri1RU];

                $checkdatesAr1 = $this->result($checkedDates);

                $checkedDates = [$fri2, $fri2R, $fri2RU];

                $checkdatesAr2 = $this->result($checkedDates);

                return [$checkdatesAr1, $checkdatesAr2];
                break;
        }
    }

    public function result($checkedDates)
    {
        if ($checkedDates[1] == 0) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>No hay resevas para el día " . $checkedDates[0] . ", anímate!</p>" .
                "<form method='POST' action='/yogaReservations' enctype='multipart/form-data' style='margin-bottom:0px'>
            <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
        } else if ($checkedDates[1] >= 1 && $checkedDates[1] <= 8 && $checkedDates[2] == 0) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Aún quedan " . (8 - $checkedDates[1]) . " plazas, te gustaría unirte?</p>" .
                "<form method='POST' action='/yogaReservations' enctype='multipart/form-data'>
                <input name='_token' type='hidden' value='" . csrf_token() . "'>
            <input type='hidden' name='reservationDate' value='$checkedDates[0]'>
            <div class='d-flex justify-content-center'><div><button type='submit'>Reservar</button></div></div>
            </form></div>";
        } else if ($checkedDates[2] == 1) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Ya tienes tu plaza reservada para el " . $checkedDates[0] . "</p>" .
                "<div class='d-flex justify-content-center'><div><button class='ms-3'><a class='text-dark text-decoration-none' href='" . url('yogaReservations/cancelclasses/' . $checkedDates[0]) . "'>Deseas cancelarla ?</a></button></div></div>";
        } else if ($checkedDates[1] == 8) {
            $checkdatesAr = "<div class='border py-3 ps-3 pe-3'><p>Lo sentimos pero ya no quedan plazas libres</p></div>";
        }

        return [$checkedDates[0], $checkdatesAr];
    }

    public function bookclasses(Request $request)
    {
        if (Db::Table('yoga_reservations')->where('reservation_date', $request->input('reservationDate'))->where('user_id', auth()->user()->id)->get()->count() == 0) {

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

        return view('reservations.indexYoga');
    }

    public function cancelclasses($matchdate)
    {
        Db::Table('yoga_reservations')->where('reservation_date', $matchdate)->where('user_id', auth()->user()->id)->delete();

        echo "<script>";
        echo "alert('La plaza se ha cancelado con éxito');";
        echo "</script>";

        return view('reservations.indexYoga');
    }
}
