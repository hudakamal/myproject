<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;



class BookingController extends Controller
{
    public function index(){
        $hid = hash('sha256', 40);
        // dd($hid);
        $hex2bin = hex2bin(40);
        // dd($hex2bin);
        $flights = Flight::orderBy('name','asc')->get();
        return view('booking',compact('flights'));
    }

    public function store(Request $request)
    {
        // $request->user_id; 
        // dd($request);
        $flight = Flight::find($request->flight);
        $id = Auth::user()->id;
        $user = User::find($id);
        // dd($user->all());

        $booking = new Booking();
        $booking->seatNo = $request->no;
        $booking->date = $request->date;
        $booking->user_id = $user->id;



        // $flight = Flight->find($request->flight);

        $flight->booking()->save($booking);
        $user->bookings()->save($booking);
        // return redirect()->intended('customer');
        return view('customer',compact('booking'));
    }
}
