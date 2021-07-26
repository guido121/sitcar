<?php

namespace App\Http\Controllers;

use App\FuelEfficiency;
use App\Truck;
use App\Cart;
use App\Employee;
use App\Customer;
use Illuminate\Http\Request;
use DB;

class FuelEfficiencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
        $search = trim($request->get('search'));
        
        $FuelEffiencies = DB::table('fuel_efficiencies as fe')
        ->join('trucks as t','fe.truck_id','=','t.id')
        ->join('employees as e','fe.driver_id','=','e.id')
        ->where('fe.active',true)
        ->where(function($query) use ($search){
            $query->where('t.plate','like','%'. $search. '%')
            ->orWhere('e.name','like','%'. $search. '%');
        })
        ->select('fe.id','t.plate','e.name')
        ->paginate(15);

        
        return view('fuel_efficiency.index',compact('FuelEffiencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trucks = Truck::pluck('plate','id');
        $carts = Cart::pluck('plate','id');
        $drivers = Employee::pluck('name','id');
        $customers = Customer::pluck('name','id');
        return view('fuel_efficiency.create',compact('trucks','carts','drivers','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        $validatedData = $request->validate([
            'driver_id' => 'required|max:11',
            'truck_id' => 'required|max:11',
            'cart_id' => 'required|max:11',
            'customer_id' => 'required|max:11',
            'weight1' => 'required|numeric',
            'weight2' => 'required|numeric',
            'mileage' => 'required|numeric',
            'fueling1' => 'required|numeric',
            'fueling2' => 'required|numeric',
            'route' => 'required|max:255', 
            'description' => 'max:255',
            'scanner_fuel_measure' => 'required|numeric',
        ]);
        

        $entity_data = new FuelEfficiency($data);

        $entity_data->save();

        return redirect()->route('fuel_efficiency.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FuelEfficiency  $fuelEfficiency
     * @return \Illuminate\Http\Response
     */
    public function show(FuelEfficiency $fuelEfficiency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FuelEfficiency  $fuelEfficiency
     * @return \Illuminate\Http\Response
     */
    public function edit(FuelEfficiency $fuelEfficiency)
    {
        $trucks = Truck::pluck('plate','id');
        $carts = Cart::pluck('plate','id');
        $drivers = Employee::pluck('name','id');
        $customers = Customer::pluck('name','id');
        return view('fuel_efficiency.edit',compact('trucks','carts','drivers','customers','fuelEfficiency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FuelEfficiency  $fuelEfficiency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FuelEfficiency $fuelEfficiency)
    {
        $validatedData = $request->validate([
            'driver_id' => 'required|max:11',
            'truck_id' => 'required|max:11',
            'cart_id' => 'required|max:11',
            'customer_id' => 'required|max:11',
            'weight1' => 'required|numeric',
            'weight2' => 'required|numeric',
            'mileage' => 'required|numeric',
            'fueling1' => 'required|numeric',
            'fueling2' => 'required|numeric',
            'route' => 'required|max:255', 
            'description' => 'max:255',
            'scanner_fuel_measure' => 'required|numeric',
        ]);
        
        $data = $request->except(['_token','_method']);
        $fuelEfficiency->fill($data);
        $fuelEfficiency->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FuelEfficiency  $fuelEfficiency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $key = trim($request->get('key'));
        
        $fuelEfficiency = FuelEfficiency::find($key);

        $fuelEfficiency->active = false;
        $fuelEfficiency->save();

        return redirect()->route('fuel_efficiency.index')->with('success','Successfull deleted!');
    }
}
