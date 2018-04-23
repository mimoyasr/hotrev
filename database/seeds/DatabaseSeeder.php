<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

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
        // $faker = Faker::create();
        // foreach (range(1,10) as $index) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => bcrypt('123456'),
        //     ]);
        // }

        DB::table('users')->insert([
            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt(123456),
        ]);
    }
    
}
