<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data = [
        	['id'=>1, 'name'=>'David Degea', 'email'=>'degea@email.com', 'password'=>bcrypt('password')],
        	['id'=>2, 'name'=>'Victor Lindelof', 'email'=>'lindelof@email.com', 'password'=>bcrypt('password')],
        	['id'=>3, 'name'=>'Anthony Valencia', 'email'=>'valencia@email.com', 'password'=>bcrypt('password')],
        ];
        DB::table('users')->insert($data);
    }
}
