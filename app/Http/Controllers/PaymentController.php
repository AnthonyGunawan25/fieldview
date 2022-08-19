<?php

namespace App\Http\Controllers;

use App\Booking;
use App\field;
use App\location;
use App\Payment;
use App\Payment_method;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class PaymentController extends Controller
{
    public function create_payment_page()
    {
        return view('new_payment_method');
    }

    public function create_payment_method(Request $request){
        $this->validate($request,
        [
            'payment_method_name' => ['required'],
            'payment_description' => ['required'],
            'image' => ['required'],
        ]);

        $payment_method = new Payment_method();
        $payment_method->payment_method_name = $request->payment_method_name;
        $payment_method->payment_description = $request->payment_description;
        $image_path = $request->file('image')->store('img', 'public');
        $payment_method->image = $image_path;
        $payment_method->save();

        return redirect()->back();
    }

    public function create_payment(Request $request)
    {   
    
            $this->validate($request,
            [
                'booking_id' => ['required'],
                'payment_method_id' => ['required'],
            ]);
        
        $payment = new Payment();
        $payment->booking_id = $request->booking_id;
        $payment->payment_method_id = $request->payment_method_id;
        $payment->user_id = Auth::user()->id;

        $payment->save();
        
        $booking = Booking::where('id','=', $request->booking_id)->get();
        
        DB::table('schedules')
            ->where('id', $booking[0]->schedule_id)
            ->update(['booking_status' => 'booked']);
        
        

        $IDbooking = '';
        $bookingID = DB::select('SELECT id FROM bookings where user_id = ?',[Auth::user()->id]);
         foreach ($bookingID as $key => $value) {
             $IDbooking.= $value->id;
             if($key != count($bookingID)-1){
                 $IDbooking .= ',';
             }
         }
        
        $payment = DB::select('SELECT * FROM payments where booking_id in ('.$IDbooking.')');
        
        // $payment_method = Payment_method::all();
        $user = User::where('id','=', Auth::user()->id)->get();
        $tempFields = array();
        $tempLocations = array();
        $tempSchedules = array();
        $tempPayments = array();
        $tempUsers = array();

        foreach ($payment as $key => $value) {
            // error_log($value->booking_id);
            $booking = Booking::where('id','=', $value->booking_id)->get();
            // dd($booking[0]->field_id);
            // $aaa = DB::select('SELECT field_name FROM fields where id = ' );
            // error_log(count($payment));
            // array_merge($temp[$key+1], DB::select('SELECT field_name FROM fields where id = '.$booking[0]->field_id));
            // array_merge($temp[$key+1], DB::select('SELECT location_name FROM locations where id = '.$booking[0]->location_id));
            array_push($tempLocations, DB::select('SELECT location_name FROM locations where id = '.$booking[0]->location_id));
            array_push($tempFields, DB::select('SELECT field_name FROM fields where id = '.$booking[0]->field_id));
            array_push($tempSchedules, DB::select('SELECT schedules_date, schedules_time_start, schedules_time_end, field_price 
                                            FROM schedules where id = '.$booking[0]->schedule_id));
            array_push($tempPayments, DB::select('SELECT payment_method_name FROM payment_methods where id = '.$value->payment_method_id));
            // array_push($temp, DB::select('SELECT name FROM users where id = '.[Auth::user()->id]));
          
            array_push($tempUsers, DB::select('SELECT name FROM users where id = '.$value->user_id));
            
            
        }
        
        // dd($tempSchedules);
        // error_log($tempField[1][0]->field_name);
        // $temp[] = "";
        // foreach ($booking as $key => $value) {
        //     error_log($key);
        //     // array_push($temp[$key],DB::select('SELECT field_name FROM field where id = ?', $value->field_id));
            
        //     // $field = field::where('id','=', $value->field_id)->get();
        // }
        // dd($temp);
        // $field = field::where('id','=', $payment[0]->field_id)->get();
        // $location = location::where('id','=', $payment[0]->location_id)->get();
        return view('view_payment_history', ['payment' => $tempPayments, 'user' => $tempUsers, 'field' => $tempFields, 'location' => $tempLocations, 'schedule' => $tempSchedules, 'payment_method' => $tempPayments]);
    }

    public function view_payment()
    {   
        if(Auth::user()->role == 'member'){
            $IDbooking = '';
            $bookingID = DB::select('SELECT id FROM bookings where user_id = ?',[Auth::user()->id]);
         foreach ($bookingID as $key => $value) {
             $IDbooking.= $value->id;
             if($key != count($bookingID)-1){
                 $IDbooking .= ',';
             }
         }
        
        $payment = DB::select('SELECT * FROM payments where booking_id in ('.$IDbooking.')');
        }
        
        else{
            $payment = DB::select('SELECT * FROM payments');
        }
        
        $user = User::where('id','=', Auth::user()->id)->get();
        $tempFields = array();
        $tempLocations = array();
        $tempSchedules = array();
        $tempPayments = array();
        $tempUsers = array();

        foreach ($payment as $key => $value) {
            // error_log($value->booking_id);
            $booking = Booking::where('id','=', $value->booking_id)->get();
            // dd($payment);
            // error_log(count($payment));
            // dd($booking[0]->field_id);
            // $aaa = DB::select('SELECT field_name FROM fields where id = ' );
            // error_log(count($payment));
            // array_merge($temp[$key+1], DB::select('SELECT field_name FROM fields where id = '.$booking[0]->field_id));
            // array_merge($temp[$key+1], DB::select('SELECT location_name FROM locations where id = '.$booking[0]->location_id));
            array_push($tempLocations, DB::select('SELECT location_name FROM locations where id = '.$booking[0]->location_id));
            array_push($tempFields, DB::select('SELECT field_name FROM fields where id = '.$booking[0]->field_id));
            array_push($tempSchedules, DB::select('SELECT schedules_date, schedules_time_start, schedules_time_end, field_price 
                                            FROM schedules where id = '.$booking[0]->schedule_id));
            array_push($tempPayments, DB::select('SELECT payment_method_name FROM payment_methods where id = '.$value->payment_method_id));
            // array_push($temp, DB::select('SELECT name FROM users where id = '.[Auth::user()->id]));
          
            $user = DB::select('SELECT name FROM users where id = '.$value->user_id);
            // error_log($booking[0]->schedule_id);
            array_push($tempUsers, DB::select('SELECT name FROM users where id = '.$value->user_id));
            
        }
        // dd($tempFields);
        
        return view('view_payment_history', ['payment' => $tempPayments, 'user' => $tempUsers, 'field' => $tempFields, 'location' => $tempLocations, 'schedule' => $tempSchedules, 'payment_method' => $tempPayments]);
    }

}
