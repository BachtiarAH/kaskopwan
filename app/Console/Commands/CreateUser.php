<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Enum\RoleEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'user:create
        {name : User name}
        {email : User email}
        {password : User password}
        {--role= : User role (default: user)}';

    /**
     * The console command description.
     */
    protected $description = 'Create a new user';

    public function handle(): int
    {
        $role = $this->option('role') ?? RoleEnum::USER->value;

        // Validate role
        if (! in_array($role, RoleEnum::values(), true)) {
            $this->error(
                'Invalid role. Allowed: ' . implode(', ', RoleEnum::values())
            );
            return self::FAILURE;
        }

        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
            'role' => $role,
        ]);

        $this->info('User created successfully!');
        $this->table(
            ['ID', 'Name', 'Email', 'Role'],
            [[$user->id, $user->name, $user->email, $user->role]]
        );

        return self::SUCCESS;
    }
}
