<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        
        $customers = Customer::where('active','=',true)
                        ->where('name','like','%'.$search.'%')
                        ->paginate(15);

                    
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'name' => 'required',
        ]);
        

        $entity_data = new Customer($data);

        $entity_data->save();

        return redirect()->route('customer.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
       
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        
        $data = $request->except(['_token','_method']);
        $customer->fill($data);
        $customer->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $key = trim($request->get('key'));
        
        $customer = Customer::find($key);

        $customer->active = false;
        $customer->save();

        return redirect()->route('customer.index')->with('success','Successfull deleted!');
    }
}
