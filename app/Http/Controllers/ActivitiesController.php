<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Timetable;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
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
            ->orderBy('timetables.dayOfTheWeek', 'ASC')
            ->get();

        return view('activities.index', compact('activityList', 'timetableList'));
    }

    /**
     * Store a new activity.
     *
     * @param  \App\Http\Requests\StoreActivityRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreActivityRequest $request)
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
    public function edit(Activity $activity)
    {
        return view('activities.edit', ['activity' => $activity]);
    }

    /**
     * Update activity data
     *
     * @param Activity $activity
     * @param  \App\Http\Requests\UpdateActivityRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Activity $activity, UpdateActivityRequest $request)
    {
        $activityUpdate = Activity::find($activity->id);
        $activityUpdate->name = $request->input('name');
        $activityUpdate->places = $request->input('places');
        $activityUpdate->update();

        $activityList = Db::Table('activities')
            ->get();

        $timetableList = Db::Table('activities')
            ->join('timetables', 'timetables.activity_id', '=', 'activities.id')
            ->select('activities.name', 'timetables.dayOfTheWeek', 'timetables.start', 'timetables.finish', 'timetables.id')
            ->orderby('activities.name')
            ->get();

        return view('activities.index')->with('activityList', $activityList)->with('timetableList', $timetableList);
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
