<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        $sqlFile = app_path() . '/../database/raw/provinces.sql';
        DB::unprepared(file_get_contents($sqlFile));
        $this->command->info('Province table seeded!');
    }
}
