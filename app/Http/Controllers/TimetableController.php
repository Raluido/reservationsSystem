<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use DB;
use Illuminate\Support\Facades\Log;

class TimetableController extends Controller
{

    public function store(Request $request)
    {
        $addTimetable = $request->except('_token');

        for ($i = 0; $i < count($addTimetable['dayOfTheWeek']); $i++) {
            $name = strtolower($addTimetable['name'][$i]);
            $name1 = preg_replace('/\s+/', '', $name);
            $activities = Db::Table('activities')->select('name', 'id')->get();
            if (count($activities) == 0) {
                echo '<div class="alert alert-warning"><strong>Warning!</strong> No hay ninguna actividad en la base de datos.</div>';
                break;
            }
            foreach ($activities as $index) {
                $fix = strtolower($index->name);
                $fix1 = preg_replace('/\s+/', '', $fix);
                if ($fix1 == $name1) {
                    for ($i = 0; $i < Count($addTimetable['dayOfTheWeek']); $i++) {
                        $timetable = new Timetable();
                        $timetable->activity_id = $index->id;
                        $timetable->dayOfTheWeek = $addTimetable['dayOfTheWeek'][$i];
                        $timetable->start = $addTimetable['start'][$i];
                        $timetable->finish = $addTimetable['finish'][$i];
                        $timetable->save();
                    }
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Esta actividad no ha sido agregada aún.</div>';
                }
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

        return view('timetables.edit', ['timetable' => $timetable, 'activity' => $activity]);
    }

    /**
     * Update timetable data
     * 
     * @param Timetable $timetable
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Timetable $timetable)
    {
        $timetable->update();

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
