<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Flight;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use resources\views\layouts;
use Illuminate\Validation\Rule;

class FlightController extends Controller
{
    
    public function index(Request $request){
        $flights = DB::select('select * from flights');
        // $id = $request->id;
        // $flights = Flight::find($id);
        return view('flight_view',['flights'=>$flights]);    
    }
    
    public function destroy($id) {
        DB::delete('delete from flights where id = ?',[$id]);
        return redirect()->back()->with('failed','Record successfully deleted.');        
    }

    public function edit($id)
    {
        try{
            $emp = Flight::select('id','name','code')->find($id);
            if($emp){
                return view('edit',['empdata'=>$emp]);
            }
            else{
                return redirect('/flight')->with('failed','Invalid Name');
            }
        }
        catch(Exception $e){
            return redirect('/flight')->with('failed','Internal server Error');
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $code = $request->input('code');  
        DB::update('update flights set name = ?,code=? where id = ?',[$name,$code,$id]);
        return redirect('/flight')->with('status','Record has been updated.');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
        ]);
    }

    public function store(Request $request){
        // dd($request->all());
        // Flight::create([
        //     'name' => $request->input('name'),
        //     'code' => $request->input('code'),
        // ]);
        $flight = new Flight;
        $flight->name = $request->name;
        $flight->code = $request->code;
        $flight->price = $request->price;
        $flight->save();

        return redirect('/flight')->with('status','Record inserted successfully.');
    }
    
}