<?php

namespace App\Console\Commands;
use App\User;
use App\Manager;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'create:admin {--name=} {--password=}';
    protected $signature = 'create:admin {--name=} {--password=} {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
       
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // dd($this->options());
        User::create([
            'name'=>$this->option('name'),
            "password"=>bcrypt($this->option('password')),
            "email"=>$this->option('email')
            ])->assignRole('Admin')->assignRole('Manager')->assignRole('Receptionist')->assignRole('Client');
       
        
    }
}
