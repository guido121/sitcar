<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        
        $carts = Cart::where('active','=',true)
                        ->where('plate','like','%'.$search.'%')
                        ->paginate(15);

                    
        return view('cart.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart.create');
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
        

        $entity_data = new Cart($data);

        $entity_data->save();

        return redirect()->route('cart.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        return view('cart.edit',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $validatedData = $request->validate([
            'plate' => 'required',
        ]);
        
        $data = $request->except(['_token','_method']);
        $cart->fill($data);
        $cart->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $key = trim($request->get('key'));
        
        $customer = Cart::find($key);

        $customer->active = false;
        $customer->save();

        return redirect()->route('cart.index')->with('success','Successfull deleted!');
    }
}
