<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Models\Flight;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use resources\views\layouts;
use Illuminate\Validation\Rule;

class FlightController extends Controller
{
    
    public function index(){
        $flights = DB::select('select * from flights');
        return view('flight_view',['flights'=>$flights]);    
    }
    public function destroy($id) {
        DB::delete('delete from flights where id = ?',[$id]);
        return redirect('/flight');
        
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

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $code = $request->input('code');  
        DB::update('update flights set name = ?,code=? where id = ?',[$name,$code,$id]);
        return redirect('/flight');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:255'],
        ]);
    }

    public function store(Request $request){
        //dd($request->all());
        Flight::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect('/flight');
    }
    
}