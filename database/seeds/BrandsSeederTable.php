<?php

use Illuminate\Database\Seeder;

class BrandsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();
        $data = [
        	['id'=>1, 'vehicle_type_id'=>1, 'name'=>'Aston Martin DB 9'],
        	['id'=>2, 'vehicle_type_id'=>1, 'name'=>'Toyota Vellvire'],
        	['id'=>3, 'vehicle_type_id'=>2, 'name'=>'Yamaha M1'],
        ];

        DB::table('brands')->insert($data);
    }
}
