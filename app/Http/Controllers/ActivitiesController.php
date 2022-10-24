<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Timetable;
use Illuminate\Support\Facades\Log;
use DB;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activityList = Db::Table('activities')
            ->join('timetables', 'timetables.activity_id', '=', 'activities.id')
            ->select('activities.name', 'timetables.dayOfTheWeek', 'timetables.start', 'timetables.finish')
            ->orderby('activities.name')
            ->get();

        return view('activities.index')->with('activityList', $activityList);
    }

    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->save();
        $addTimetables = $request->except('name', '_token');
        for ($i = 0; $i < (count($addTimetables)) / 3; $i++) {
            if (strtotime($addTimetables['start'][$i]) > strtotime($addTimetables['finish'][$i])) {
                echo '<div>El horario de finalización debe de ser posterior al de inicio</div>';
                break;
            }
            $newTimes[] = new Timetable([
                'dayOfTheWeek' => $addTimetables['dayOfTheWeek'][$i],
                'start' => $addTimetables['start'][$i],
                'finish' => $addTimetables['finish'][$i],
            ]);
        }

        $activity->timetables()->saveMany($newTimes);

        return redirect()->back();
    }
}
