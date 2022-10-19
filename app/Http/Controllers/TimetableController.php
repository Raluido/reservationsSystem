<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class TimetableController extends Controller
{
    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->dayOfTheWeek = $request->input('dayOfTheWeek');
        $activity->start = $request->input('start');
        $activity->finish = $request->input('finish');

        if (strtotime($request->input('start')) < strtotime($request->input('finish'))) {
            $activity->save();
        } else {
            echo '<div>El horario de finalización debe de ser posterior al de inicio</div>';
        }


        return redirect()->back();
    }
}
