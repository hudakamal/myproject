<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;



class BookingController extends Controller
{
    public function index(){
        $flights = Flight::orderBy('name','asc')->get();
        return view('booking',compact('flights'));
    }

    public function store(Request $request)
    {
        // $request->booking_id 
        // dd($request->all());
        $flight = Flight::find($request->flight);

        $booking = new Booking();
        $booking->seatNo = $request->no;
        $booking->date = $request->date;



        // $flight = Flight->find($request->flight);

        $flight->booking()->save($booking);

        return redirect()->intended('customer');
    }
}
