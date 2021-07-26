<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelEfficiency extends Model
{
    protected $table = 'fuel_efficiencies';
    protected $primaryKey = 'id';
    protected $fillable = ['truck_id','cart_id','driver_id','customer_id','fueling1','fueling2','mileage','route','weight1','weight2','observation','scanner_fuel_measure'];

    public function truck()
    {
        return $this->belongsTo('App\Truck','truck_id','id');
    }
    public function cart()
    {
        return $this->belongsTo('App\Cart','cart_id','id');
    }
    public function driver()
    {
        return $this->belongsTo('App\Employee','driver_id','id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id','id');
    }
}
