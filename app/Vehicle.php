<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
   	protected $table = 'vehicles';

   	protected $fillable = [
   							'user_id', 'vehicle_type_id', 'brand_id', 'description', 'province_id', 'city_id',
   							'district_id','address','is_displayed','status','premium'
   						];

   	//Relation with User
   	public function owner()
   	{
   		return $this->belongsTo('App\User');
   	}

   	//Relation to Vehicle Type
   	public function vehicle_type()
   	{
   		return $this->belongsTo('App\VehicleType');
   	}

   	//Relation to Brand
   	public function brand()
   	{
   		return $this->belongsTo('App\Brand');
   	}
   	
   	//Relation to Vehicle Media
   	public function vehicle_media(){
   		return $this->hasMany('App\VehicleMedia');
   	}

      //Get the primay media of the vehicle
      public function primary_media()
      {
         return $this->hasMany('App\VehicleMedia')->where('is_primary',TRUE);
      }

      //Relation to Province
      public function province()
      {
         return $this->belongsTo('App\Province');
      }

      //Relation to City
      public function city()
      {
         return $this->belongsTo('App\City');
      }

      //Relation to District
      public function district()
      {
         return $this->belongsTo('App\District');
      }
}
