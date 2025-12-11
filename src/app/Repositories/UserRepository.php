<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function getAllWithRelations()
    {
        return User::with(['roles', 'permissions'])->get();
    }

    public function findWithRelations($id)
    {
        return User::with(['roles', 'permissions'])->findOrFail($id);
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function findRole($roleId)
    {
        return Role::findOrFail($roleId);
    }

    public function createUser(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
        ]);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}
