<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $fillable = ['city_id', 'name', 'latitude', 'longitude'];


    //Relation to City
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
}
