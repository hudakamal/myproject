<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use Hashids\Hashids;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\Customer;

class InvoiceController extends Controller
{
    //
    public function index(){

    }

    public function display($encryptedId){
        // dd($id);
    // $customers = DB::table('customers')->latest('id')->first();
    // $customers = DB::table('customers')->orderBy('id','DESC')->first();
    // dd($customers);
        $hashids = new Hashids('my_salt_value', 6); // initialize the Hashids object with the same salt value and minimum hash length as before
    $id = $hashids->decode($encryptedId); // decode the encrypted ID into its original numeric value
    if (!$id || !is_array($id) || count($id) !== 1) {
        // Error handling if the encrypted ID is invalid
        return abort(404);
    }

    $booking = Booking::find($id[0]); // find the booking model with the given ID
    if (!$booking) {
        // Error handling if the booking model does not exist
        return abort(404);
    }
    // dd($booking->flight);    
    return view('invoice',compact('booking'));

}
}
