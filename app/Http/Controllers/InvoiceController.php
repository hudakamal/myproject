<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Customer;

class InvoiceController extends Controller
{
    //
    public function index(){

    }

    public function display($id){
        // dd($id);
    // $customers = DB::table('customers')->latest('id')->first();
    // $customers = DB::table('customers')->orderBy('id','DESC')->first();
    // dd($customers);
    $booking = Booking::find($id);
    // dd($booking->flight);    
    return view('invoice',compact('booking'));

    }
}
