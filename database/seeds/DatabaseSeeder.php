<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //omnia seed reciprion
        DB::table('users')->insert([
            'name' => "omnia",
            'email' => "omnia".'@gmail.com',
            'password' => bcrypt('11111'),
        ]);
        //-------------------------------------//
    }
}
