<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\User;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('customer');
    }

        // 
    public function store(Request $request)
    {
        // dd($id);
        // $request->booking_id 
        // dd($request->all());
        // dd();
        $booking = Booking::find($request->booking_id);
        $id = Auth::user()->id;
        $user = User::find($id);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->user_id = $user->id;
        $customer->booking_id = $booking->id;
        // dd($customer);


        // $flight = Flight->find($request->flight);

        $booking->customer()->save($customer);
        $user->customer()->save($customer);
        return redirect('display/'.$booking->id)->with('status','Successfully'); 
    }
}
