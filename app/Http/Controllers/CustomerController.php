<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('customer');
    }
    
    public function store(Request $request)
    {
        // $request->booking_id 
        // dd($request->all());
        $post = new Customer();
        $post->name = $request->name;
        $post->age = $request->age;


        $booking = Booking->find($request->booking_id);

        $bookings->customer()->save($post);

        return redirect()->intended('flight_view');
    }
}
