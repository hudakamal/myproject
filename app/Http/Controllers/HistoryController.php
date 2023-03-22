<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Models\Customer;
use App\Models\User;

class HistoryController extends Controller
{
    //
    public function index(Request $request){
        $user = Auth::user();
        $bookings = $user->bookings;

        return view('history',compact('bookings'));  
    }


    public function history(Request $request){
        // $bookings
        // $users = Auth::user()->id;
        // dd($users);  
        // return view('history',compact('users'));  
    }
}
