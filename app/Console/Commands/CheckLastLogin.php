<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use carbon\Carbon as carbon;
use App\Notifications\CheckUsNotification;

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
        $now = Carbon::now()->timestamp;
        $mon = 2952000;
        $targ = $now - $mon ;
        $users = User::where('last_action', '<', $targ)
                     ->get('email');
        foreach($users as $user){
            $user->notify(new CheckUsNotification);
        }

        echo "last login handler!! \n";

    }
}
