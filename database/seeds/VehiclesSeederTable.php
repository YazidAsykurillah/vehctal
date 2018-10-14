<?php

use Illuminate\Database\Seeder;

class VehiclesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->delete();

        $data = [
        	['id'=>1, 'user_id'=>1, 'vehicle_type_id'=>1, 'brand_id'=>1, 'description'=>'My Vehicle Description'],
        	['id'=>2, 'user_id'=>1, 'vehicle_type_id'=>1, 'brand_id'=>2, 'description'=>'My Vehicle Description'],
        	['id'=>3, 'user_id'=>2, 'vehicle_type_id'=>2, 'brand_id'=>3, 'description'=>'My Vehicle Description'],
        ];

        DB::table('vehicles')->insert($data);
    }
}
