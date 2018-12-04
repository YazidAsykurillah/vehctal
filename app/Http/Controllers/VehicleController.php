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
use App\Media;

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
        //check if request has non_primary_medias
        if($request->hasFile('non_primary_medias')){

            $allowedfileExtension=['pdf','jpg','png','docx'];

            $npm_files = $request->file('non_primary_medias');

            foreach($npm_files as $npm_file){

                $npm_filename = time().'.'.$npm_file->getClientOriginalName();

                $npm_extension = $npm_file->getClientOriginalExtension();

                $check=in_array($npm_extension,$allowedfileExtension);

                //dd($check);

                if($check){
                    foreach ($request->non_primary_medias as $npm) {
                        $npm_filename = $npm->store('media', $npm_filename);
                    }
                }
            }
        }
        
        exit();
        //Upload the primary media
        $pm= $request->file('primary_media');
        $extension = $pm->getClientOriginalExtension();
        $pm_file_name = time().'.'.$extension;
        $store = $pm->storeAs(
            'media', $pm_file_name
        );

        $pm_file_path = storage_path('app/public/media/'.$pm_file_name);
        Image::make($pm_file_path)->resize(242, 200)->save(storage_path('app/public/media/thumb_'.$pm_file_name));
        
        //now save vehicle model
        $newVehicle = new Vehicle;
        $newVehicle->user_id = Auth::user()->id;
        $newVehicle->vehicle_type_id = $request->vehicle_type_id;
        $newVehicle->brand_id = $request->brand_id;
        $newVehicle->description = $request->description;
        $newVehicle->save();

        //attach vehicle primary media
        $vpm_data = [
            'vehicle_id'=>$newVehicle->id,
            'path'=>'media/thumb_'.$pm_file_name,
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
