<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class TimetableController extends Controller
{
    public function create()
    {
        return view('reservations.create');
    }

    public function update(Request $request)
    {
        $activity = new Activity();
        $activity = $request->input('activity');
        $activity = $request->input('dayOfTheWeek');
        $activity = $request->input('time');

        $activity->save();

        return redirect();
    }
}
