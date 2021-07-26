<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $table = 'trucks';
    protected $primaryKey = 'id';
    protected $fillable = ['plate'];

    public function fuelEfficiencies()
    {
        return $this->hasMany('App\FuelEfficiency','truck_id','id');
    }
}
