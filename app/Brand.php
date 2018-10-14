<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = ['vehicle_type_id', 'name'];

    public function vehicle_type()
    {
    	return $this->belongsTo('App\VehicleType');
    }


    public function vehicles()
    {
    	return $this->hasMany('App\Vehicle');
    }
}
