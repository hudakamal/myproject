<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateProfile(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);
 
        # check if user profile image is null, then validate
        if (auth()->user()->avatar_path == null) {
             $validate_image = Validator::make($request->all(), [
                'avatar_path' => ['required', 'image', 'max:1000']
            ]);
             # check if their is any error in image validation
            if ($validate_image->fails()) {
                return response()->json(['code' => 400, 'msg' => $validate_image->errors()->first()]);
            }
        }
 
        # check if their is any error
        if ($validated->fails()) {
            return response()->json(['code' => 400, 'msg' => $validated->errors()->first()]);
        }
 
        # check if the request has profile image
        if ($request->hasFile('avatar_path')) {
            $imagePath = 'storage/'.auth()->user()->avatar_path;
            # check whether the image exists in the directory
            if (File::exists($imagePath)) {
                # delete image
                File::delete($imagePath);
            }
            $avatar_path = $request->avatar_path->store('avatar', 'public');
        }
 
        # update the user info
        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar_path' => $avatar_path ?? auth()->user()->avatar_path 
        ]);
        return response()->json(['code' => 200, 'msg' => 'profile updated successfully.']);
    }
}
