<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name','type'];

    public function fuelEfficiencies()
    {
        return $this->hasMany('App\FuelEfficiency','driver_id','id');
    }
}
