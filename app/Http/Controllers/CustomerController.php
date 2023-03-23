<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Hashids\Hashids;
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
        $booking = Booking::find($request->booking_id);
        // dd($user->all());

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->booking_id = $booking->id;
        // dd($customer);


        // $flight = Flight->find($request->flight);

        $booking->customer()->save($customer);
        $id = $booking->id; 
        $hashids = new Hashids('my_salt_value', 6); // initialize the Hashids object with a salt value and a minimum hash length of 6
        $encryptedId = $hashids->encode($id);
        return redirect('display/'.$encryptedId)->with('status','Successfully'); 
    }
}
