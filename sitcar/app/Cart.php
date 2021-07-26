<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = ['plate'];

    public function fuelEfficiencies()
    {
        return $this->hasMany('App\FuelEfficiency','cart_id','id');
    }
}
