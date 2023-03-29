<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function index(Request $request){
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
    $file = $request->file('avatar_path');
    
    if($request->hasFile('avatar_path'))
    {
        $destination_path = 'public/avatars';
        $image = $request->file('avatar_path');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('avatar_path')->storeAs($destination_path,$image_name);

        $id = Auth::user()->id;
        $user = User::find($id); // assuming you have a variable $id containing the ID of the booking to be updated
        $old_avatar_path = $user->avatar_path;

        // update the user with the new file path
        $user->avatar_path = $image_name;
        $user->save();

        // delete the old file
        Storage::delete($destination_path.'/'.$old_avatar_path);
    }



    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
