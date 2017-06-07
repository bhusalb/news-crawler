<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $name = $this->ask('Enter name:');
        $email = $this->ask('Enter email:');
        $password = $this->secret('Enter password:');
        $user = User::create(['name' => $name, 'password' => bcrypt($password), 'email' => $email]);
        $this->info('Admin User is created!!' . PHP_EOL . 'Have good day!!');
    }
}
