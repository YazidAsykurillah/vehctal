<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->delete();
        $sqlFile = app_path() . '/../database/raw/districts.sql';
        DB::unprepared(file_get_contents($sqlFile));
        $this->command->info('Districts table seeded!');
    }
}
