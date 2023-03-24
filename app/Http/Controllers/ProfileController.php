<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = auth()->user();
    return view('profile', compact('user'));
    }

    public function update(){
        $user = auth()->user();
        return view('profile_edit', compact('user'));
    }

    public function edit(Request $request){
    $user = Auth::user();

    $user->name = $request->input('name');
    $user->email = $request->input('email');

    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
