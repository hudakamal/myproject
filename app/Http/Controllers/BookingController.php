<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;



class BookingController extends Controller
{
    public function index(){
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

        if($request->hasFile('file_path'))
        {
            $destination_path = 'public/receipt/booking';
            $image = $request->file('file_path');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('file_path')->storeAs($destination_path,$image_name);
            $booking['file_path'] = $image_name;
            // dd('/public/receipt/booking/'.$booking->file_path);
        }

        // Define the file path

        // Store the file in the specified file path
        


        // $flight = Flight->find($request->flight);

        $flight->booking()->save($booking);
        $user->bookings()->save($booking);
        // return redirect()->intended('customer');
        return view('customer',compact('booking'));
    }
}
