<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('customer');
    }

    public function store(Request $request)
    {
        // $request->booking_id 
        // dd($request->all());
        // dd();
        $booking = Booking::find($request->booking_id);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;


        // $flight = Flight->find($request->flight);

        $booking->customer()->save($customer);

        // return redirect()->intended('display/{$id}');
        return redirect('display/'.$booking->id)->with('status','Successfully'); 
    }
}
