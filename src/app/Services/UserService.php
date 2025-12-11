<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function getAllUsersWithRolesPermissions()
    {
        $users = $this->users->getAllWithRelations();

        return $users->map(function ($user) {
            return [
                'id'          => $user->id,
                'name'        => $user->name,
                'email'       => $user->email,
                'created_at'  => $user->created_at,
                'roles'       => $user->getRoleNames(),
                'permissions' => $user->getAllPermissions()->pluck('name'),
            ];
        });
    }

    public function getUserDetail($id)
    {
        $user = $this->users->findWithRelations($id);

        return [
            'user' => [
                'id'          => $user->id,
                'name'        => $user->name,
                'email'       => $user->email,
                'created_at'  => $user->created_at,
            ],
            'roles'       => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ];
    }

    public function assignRoles($userId, array $roles)
    {
        $user = $this->users->find($userId);
        $user->assignRole($roles);
        return $user->getRoleNames();
    }

    public function removeRole($userId, $roleId)
    {
        $user = $this->users->find($userId);
        $role = $this->users->findRole($roleId);

        $user->removeRole($role);

        return $user->getRoleNames();
    }
}
