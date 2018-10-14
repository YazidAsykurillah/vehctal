<?php

use Illuminate\Database\Seeder;

class VehicleTypesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->delete();
        $data = [
        	['id'=>1, 'name'=>'Car', 'description'=>'Car has four wheels', 'icon'=>'car_icon.jpg'],
        	['id'=>2, 'name'=>'Motorcycle', 'description'=>'Motorcycle has two wheels', 'icon'=>'motorcycle_icon.jpg'],
        ];
        DB::table('vehicle_types')->insert($data);
    }
}
