<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreVehicleRequest;

use Image;

use Auth;

use App\VehicleType;
use App\Vehicle;
use App\User;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth::user()->id)->paginate(10);
     
        return view('vehicle.index')
            ->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_type_opts = VehicleType::pluck('name', 'id');
        return view('vehicle.create')
            ->with('vehicle_type_opts', $vehicle_type_opts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        //Upload the images
        $primaryMedia= $request->file('primary_media');
        $extension = $primaryMedia->getClientOriginalExtension();
        $originalImage = Image::make($primaryMedia);
        $imagePath = public_path().'/files/'.Auth::user()->id.'/images/';
        $imageName = time().'.'.$extension;
        $originalImage->save($imagePath.'vehicle_'.$imageName);

        $originalImage->resize(240,200);
        $originalImage->save($imagePath.'thumb_vehicle_'.$imageName);

        //now save it to database
        $newVehicle = new Vehicle;
        $newVehicle->user_id = Auth::user()->id;
        $newVehicle->vehicle_type_id = $request->vehicle_type_id;
        $newVehicle->brand_id = $request->brand_id;
        $newVehicle->description = $request->description;
        $newVehicle->save();

        //attach vehicle primary media
        $vpm_data = [
            'vehicle_id'=>$newVehicle->id,
            'file_name'=>'vehicle_'.$imageName,
            'is_primary'=>TRUE,
            'is_allowed'=>TRUE
        ];
        \DB::table('vehicle_media')->insert($vpm_data);

        return redirect('vehicle');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
