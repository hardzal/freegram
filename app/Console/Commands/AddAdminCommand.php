<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {username} {password} {email} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $this->info('Admin has been created');
        // $this->warn('Something not working!');
        // $this->error('Error!!');

        $admin = User::create([
            'name' => $this->argument('name') ?? 'Admin',
            'username' => $this->argument('username'),
            'password' => Hash::make($this->argument('password')),
            'email' => $this->argument('email'),
            'role_id' => 1
        ]);

        $this->info("Added: " . $admin->username);

        // $this->ask();
        // $this->confirm();
    }
}
