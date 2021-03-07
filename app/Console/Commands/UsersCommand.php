<?php
//Example creating custom command to show users from database in command line...
//Developer : Hatem Ghaly
//Mobile : +201148699647
//My Profile : https://www.linkedin.com/in/hatem-mohammed-ghaly-05610288/
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\User;
use Symfony\Component\Console\Helper\Table;

class UsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show Users in Command line';

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
     * @return int
     */
    public function handle()
    {
    $users=User::all();
     // Create a new Table instance.
    $table = new Table($this->output);
    
    // Set the table headers.
    $table->setHeaders([
        'Name', 'Address','Age'
    ]);
    $arr=[];
    foreach ($users as $user)
    {
       array_push($arr,[$user->name, $user->address,$user->age]);
    }
    $table->setRows($arr);
    // Render the table to the output.
    $table->render();
    }
}
