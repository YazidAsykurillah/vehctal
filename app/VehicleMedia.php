<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleMedia extends Model
{
    protected $table = 'vehicle_media';

    protected $fillable = ['vehicle_id','title', 'path', 'is_primary', 'is_allowed'];
}
