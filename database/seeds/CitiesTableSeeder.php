<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $sqlFile = app_path() . '/../database/raw/cities.sql';
        DB::unprepared(file_get_contents($sqlFile));
        $this->command->info('Cities table seeded!');
    }
}
