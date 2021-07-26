<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        
        $trucks = Truck::where('active','=',true)
                        ->where('plate','like','%'.$search.'%')
                        ->paginate(15);

                    
        return view('truck.index',compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truck.create');
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
            'plate' => 'required',
        ]);
        

        $entity_data = new Truck($data);

        $entity_data->save();

        return redirect()->route('truck.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        return view('truck.edit',compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $validatedData = $request->validate([
            'plate' => 'required',
        ]);
        
        $data = $request->except(['_token','_method']);
        $truck->fill($data);
        $truck->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $key = trim($request->get('key'));
        
        $customer = Truck::find($key);

        $customer->active = false;
        $customer->save();

        return redirect()->route('truck.index')->with('success','Successfull deleted!');
    }
}
