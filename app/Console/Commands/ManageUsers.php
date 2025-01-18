<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ManageUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:manage
                            {action : Action to perform (create, verify, grant, revoke, list)}
                            {--email= : Email of the user}
                            {--name= : Name of the user (for create)}
                            {--password= : Password for the user (for create)}
                            {--permissions= : Permissions to grant or revoke (for grant/revoke)}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage users, including creation, email verification, and permissions.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $action = $this->argument('action');

        switch ($action) {
            case 'create':
                $this->createUser();
                break;

            case 'verify':
                $this->verifyEmail();
                break;

            case 'grant':
                $this->grantPermissions();
                break;

            case 'revoke':
                $this->revokePermissions();
                break;

            case 'list':
                $this->listUsers();
                break;

            default:
                $this->error('Invalid action. Use create, verify, grant, revoke, or list.');
        }

        return Command::SUCCESS;
    }

    protected function createUser()
    {
        $name = $this->option('name') ?? $this->ask('Enter user name');
        $email = $this->option('email') ?? $this->ask('Enter user email');
        $password = $this->option('password') ?? $this->secret('Enter user password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("User {$user->name} ({$user->email}) created successfully.");
    }

    protected function verifyEmail()
    {
        $email = $this->option('email') ?? $this->ask('Enter user email');

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->email_verified_at = now();
        $user->save();

        $this->info("User {$user->name}'s email verified successfully.");
    }

    protected function grantPermissions()
    {
        $email = $this->option('email') ?? $this->ask('Enter user email');
        $permissions = (int) ($this->option('permissions') ?? $this->ask('Enter permissions to grant (0-7)'));

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->grantPermission($permissions);

        $this->info("Permissions granted to user {$user->name}. Current permissions: {$user->permissions}");
    }

    protected function revokePermissions()
    {
        $email = $this->option('email') ?? $this->ask('Enter user email');
        $permissions = (int) ($this->option('permissions') ?? $this->ask('Enter permissions to revoke (0-7)'));

        $user = User::where('email', $email)->first();
        if (!$user) {
            $this->error('User not found.');
            return;
        }

        $user->revokePermission($permissions);

        $this->info("Permissions revoked from user {$user->name}. Current permissions: {$user->permissions}");
    }

    protected function listUsers()
    {
        $users = User::all(['id', 'name', 'email', 'permissions', 'email_verified_at']);

        $this->table(
            ['ID', 'Name', 'Email', 'Permissions', 'Email Verified'],
            $users->toArray()
        );
    }
}
