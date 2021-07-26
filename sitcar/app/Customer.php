<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function fuelEfficiencies()
    {
        return $this->hasMany('App\FuelEfficiency','customer_id','id');
    }
}
