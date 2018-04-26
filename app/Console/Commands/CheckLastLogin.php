<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class CheckLastLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:last-login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check for the last login if exceeded one month send a notification';

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
        //TODO add notification to users last login exceeded 30 days 
        echo "last login handler!! \n";

    }
}
