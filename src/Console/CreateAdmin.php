<?php

namespace Level7up\Dashboard\Console;

use Exception;
use Illuminate\Console\Command;
use Level7up\Dashboard\Actions\CreateAdmin as CreateAdminAction;

class CreateAdmin extends Command
{
    protected $signature = 'dashboard:create-admin';

    protected $description = 'Create new admin';

    public function handle()
    {
        $name = $this->ask('Enter admin name', 'Admin');
        $email = $this->ask("Enter admin email", 'admin@hashstudio.com');
        $password = $this->ask("Enter admin password", "password");
        // $role = $this->ask("Enter role name", "super admin");

        try {
            (new CreateAdminAction)([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password,
                // 'role' => $role,
            ]);
        } catch (Exception $ex) {
            $this->error($ex->getMessage());

            foreach ($ex->errors() as $key => $errors) {
                $this->info($key. "\n". implode(", ", $errors));
            }

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
