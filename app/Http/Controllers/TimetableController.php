<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Http\Requests\StoreTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;
use Illuminate\Support\Facades\Log;
use DB;

class TimetableController extends Controller
{

    /**
     * Store a timetable.
     *
     * @param  \App\Http\Requests\StoreTimetableRequest  $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreTimetableRequest $request)
    {
        $addTimetable = $request->except('_token');

        for ($i = 0; $i < count($addTimetable['dayOfTheWeek']); $i++) {
            for ($i = 0; $i < Count($addTimetable['dayOfTheWeek']); $i++) {
                $timetable = new Timetable();
                $timetable->activity_id = $addTimetable['name'][$i];
                $timetable->dayOfTheWeek = $addTimetable['dayOfTheWeek'][$i];
                $timetable->start = $addTimetable['start'][$i];
                $timetable->finish = $addTimetable['finish'][$i];
                $timetable->save();
            }
        }

        return redirect()
            ->route('activities.index');
    }

    /**
     * Update timetable data
     * 
     * @param Timetable $timetable
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        $activity = Db::Table('activities')
            ->join('timetables', 'timetables.activity_id', '=', 'activities.id')
            ->select('activities.name', 'timetables.activity_id')
            ->where('timetables.activity_id', '=', $timetable->activity_id)
            ->value('activities.name');

        $activityList = Db::Table('activities')
            ->get();

        return view('timetables.edit', compact('timetable', 'activity', 'activityList'));
    }

    /**
     * Update timetable data
     * 
     * @param Timetable $timetable
     * @param  \App\Http\Requests\UpdateimetableRequest  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Timetable $timetable, UpdateTimetableRequest $request)
    {
        $timetableAdd = Timetable::find($timetable->id);
        $timetableAdd->activity_id = $request->input('name');
        $timetableAdd->dayOfTheWeek = $request->input('dayOfTheWeek');
        $timetableAdd->start = $request->input('start');
        $timetableAdd->finish = $request->input('finish');
        $timetableAdd->update();

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
     * Delete timetable data
     *
     * @param Timetable $timetable
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        Db::Table('timetables')->where('id', $timetable->id)->delete();

        return redirect()
            ->route('activities.index')
            ->withSuccess(__('Horario borrado exitosamente'));
    }
}
