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
        $addTimetable = $request->all();

        for ($i = 0; $i < count($addTimetable); $i++) {
            $timetable = new Timetable();
            $name = strtolower($addTimetable['name']);
            $name1 = preg_replace('/\s+/', '', $name);
            $activities = Db::Table('activities')->select('name', 'id')->get();
            if (count($activities) == 0) {
                'echo <div>No hay ninguna actividad en la base de datos.</div>';
            }

            foreach ($activities as $index) {
                $fix = strtolower($index->name);
                $fix1 = preg_replace('/\s+/', '', $fix);
                if ($fix1 == $name1) {
                    for ($i = 0; $i < Count($addTimetable['dayOfTheWeek']); $i++) {
                        $timetable->activity_id = $index->id;
                        $timetable->dayOfTheWeek = $addTimetable['dayOfTheWeek'][$i];
                        $timetable->start = $addTimetable['start'][$i];
                        $timetable->finish = $addTimetable['finish'][$i];
                        $timetable->save();
                    }
                } else {
                    'echo <div>Esta actividad no ha sido agregada aún.</div>';
                }
            }
        }

        return redirect()->back();
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
