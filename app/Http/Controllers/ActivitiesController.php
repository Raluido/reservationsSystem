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
            ->get();

        $timetableList = Db::Table('activities')
            ->join('timetables', 'timetables.activity_id', '=', 'activities.id')
            ->select('activities.name', 'timetables.dayOfTheWeek', 'timetables.start', 'timetables.finish')
            ->get();

        return view('activities.index')->with('activityList', $activityList)->with('timetableList', $timetableList);
    }

    public function store(Request $request)
    {
        
        $addActivity = $request->except('_token');
        log::info($addActivity);
        
        for ($i = 0; $i < count($addActivity['name']); $i++) {
            $activity = new Activity();
            $activity->name = $addActivity['name'][$i];
            $activity->places = $addActivity['places'][$i];
            $activity->save();
        }

        return redirect()->back();
    }
}





// $addTimetables = $request->except('name', '_token');
// for ($i = 0; $i < (count($addTimetables)) / 3; $i++) {
//     if (strtotime($addTimetables['start'][$i]) > strtotime($addTimetables['finish'][$i])) {
//         echo '<div>El horario de finalización debe de ser posterior al de inicio</div>';
//         break;
//     }
//     $newTimes[] = new Timetable([
//         'dayOfTheWeek' => $addTimetables['dayOfTheWeek'][$i],
//         'start' => $addTimetables['start'][$i],
//         'finish' => $addTimetables['finish'][$i],
//     ]);
// }

// $activity->timetables()->saveMany($newTimes);
