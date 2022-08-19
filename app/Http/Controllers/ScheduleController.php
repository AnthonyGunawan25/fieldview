<?php

namespace App\Http\Controllers;

use App\field;
use App\location;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create_schedule_page($id)
    {
        $field = field::where('id','=', $id)->get();
        $location = location::where('id','=', $field[0]->location_id)->get();
        return view('new_schedule', ['field' => $field, 'location' => $location]);
    }

    public function view_schedule_page($id)
    {
        $schedule = Schedule::where('field_id','=', $id)->get();
        $field = field::where('id','=', $id)->get();
        if (sizeof($schedule)> 0){
            $location = location::where('id','=', $field[0]->location_id)->get();
            return view('view_schedule', ['id' => $id, 'field' => $field, 'location' => $location, 'schedule' => $schedule]);
          }else{
            return view('view_schedule' , ['id' => $id, 'field' => $field]);
          }
    }

    public function create_schedule(Request $request)
    {
        // dd($request);
        $this->validate($request,
        [
            'schedules_date' => ['required'],
            'schedules_time_start' => ['required'],
            'schedules_time_end' => ['required'],
            'field_price' => ['required'],
            'field_id' => ['required'],
        
        ]);

        $schedule = new Schedule();
        $schedule->schedules_date = $request->schedules_date;
        $schedule->schedules_time_start = $request->schedules_time_start;
        $schedule->schedules_time_end = $request->schedules_time_end;
        $schedule->field_price = $request->field_price;
        $schedule->field_id = $request->field_id;
        $schedule->booking_status = "available";
        $schedule->save();

        return redirect()->to('view_schedule/'.$schedule->field_id);
    }

    public function delete_schedule($id){
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->back();
    }
}
