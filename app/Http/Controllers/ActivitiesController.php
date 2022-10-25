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
            ->select('activities.name', 'timetables.dayOfTheWeek', 'timetables.start', 'timetables.finish', 'timetables.id')
            ->orderby('activities.name')
            ->get();

        return view('activities.index')->with('activityList', $activityList)->with('timetableList', $timetableList);
    }

    public function store(Request $request)
    {

        $addActivity = $request->except('_token');

        for ($i = 0; $i < count($addActivity['name']); $i++) {
            $activity = new Activity();
            $activity->name = $addActivity['name'][$i];
            $activity->places = $addActivity['places'][$i];
            $activity->save();
        }

        return redirect()->back();
    }

    /**
     * Update activity data
     *
     * @param Activity $activity
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Activity $activity)
    {
        $activity->update();

        return redirect()
            ->route('activities.index')
            ->withSuccess(__('Actividad actualizada exitosamente'));
    }


    /**
     * Delete activity data
     *
     * @param Activity $activity
     *
     * @return \Illuminate\Http\Response
     */

    public function destroy(Activity $activity)
    {
        Db::Table('activities')->where('id', $activity->id)->delete();

        return redirect()
            ->route('activities.index')
            ->withSuccess(__('Actividad borrada exitosamente'));
    }
}
