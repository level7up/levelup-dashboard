<?php

namespace Level7up\Dashboard\Actions;

use Illuminate\Support\Facades\Hash;
use Level7up\Dashboard\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class CreateAdmin
{
    public function __invoke(array $data): Admin
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        throw_if($validator->fails(), ValidationException::class, $validator);

        $admin = Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // $admin->assignRole($data['role']);

        return $admin;
    }
}
