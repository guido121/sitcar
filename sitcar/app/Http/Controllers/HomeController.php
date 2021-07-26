<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FuelEfficiency;
use DB;

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
    public function index(Request $request)
    {
        $query = trim($request->get('search'));

        $FuelEffiencies = DB::table('fuel_efficiencies as fe')
        ->join('trucks as t','fe.truck_id','=','t.id')
        ->join('employees as e','fe.driver_id','=','e.id')
        ->where('fe.active',true)
        ->orWhere('t.plate','like','%'. $query. '%')
        ->orWhere('e.name','like','%'. $query. '%')
        ->select('fe.id','t.plate','e.name')
        ->paginate(15);


        return view('fuel_efficiency.index',compact('FuelEffiencies'));
    }
}
