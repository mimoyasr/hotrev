<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Manager']);
        Role::create(['name' => 'Receptionist']);
        Role::create(['name' => 'Client']);
        User::create([
            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt(123456),
        ])
        ->assignRole('Admin')
        ->assignRole('Manager')
        ->assignRole('Receptionist')
        ->assignRole('Client');
        $this->call('CountriesSeeder');
    }
    
}
