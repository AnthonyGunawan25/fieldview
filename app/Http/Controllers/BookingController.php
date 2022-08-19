<?php

namespace App\Http\Controllers;

use App\Booking;
use App\field;
use App\location;
use App\Payment_method;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function view_booking_page($id)
    {
        $user = User::where('id','=', Auth::user()->id)->get();
        $schedule = schedule::where('id','=', $id)->get();
        $field = field::where('id','=', $schedule[0]->field_id)->get();
        $location = location::where('id','=', $field[0]->location_id)->get();

        return view('view_booking_page', ['user' => $user, 'field' => $field, 'location' => $location, 'schedule' => $schedule]);
    }

    public function create_booking(Request $request)
    {
        // dd($request);
        $this->validate($request,
        [
            'schedule_id' => ['required'],
            'location_id' => ['required'],
            'field_id' => ['required'],
            'user_id' => ['required'],
        ]);
        
        $booking = new Booking();
        $booking->schedule_id = $request->schedule_id;
        $booking->location_id = $request->location_id;
        $booking->field_id = $request->field_id;
        $booking->user_id = $request->user_id;
        
        $booking->save();

        $payment = DB::select('SELECT b.id, b.schedule_id, b.location_id, b.field_id, b.user_id, b.created_at
        FROM bookings b
           INNER JOIN(
             SELECT user_id, MAX(created_at) as MAXDATE
            FROM bookings
            where user_id = ?
            group by user_id
        )
        tm on b.user_id = tm.user_id AND b.created_at = tm.MAXDATE',[Auth::user()->id]);
        
        $payment_method = Payment_method::all();
        $user = User::where('id','=', Auth::user()->id)->get();
        $schedule = schedule::where('id','=', $payment[0]->schedule_id)->get();
        $field = field::where('id','=', $payment[0]->field_id)->get();
        $location = location::where('id','=', $payment[0]->location_id)->get();
        return view('view_payment', ['payment' => $payment, 'user' => $user, 'field' => $field, 'location' => $location, 'schedule' => $schedule, 'payment_method' => $payment_method]);
    }
    
}