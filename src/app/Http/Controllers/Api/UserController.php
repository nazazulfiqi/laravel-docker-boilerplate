<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Get all users with roles and permissions
     */
    public function index()
    {
        $users = User::with('roles', 'permissions')->get(); // eager load relations

        $data = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'roles' => $user->getRoleNames(),
                'permissions' => $user->getAllPermissions()->pluck('name'),
            ];
        });

        return ApiResponse::success($data, 'Users retrieved successfully');
    }

    public function show($id)
    {
        $user = User::with('roles', 'permissions')->findOrFail($id);

        $data = [
            'user' => [
                'id'          => $user->id,
                'name'        => $user->name,
                'email'       => $user->email,
                'created_at'  => $user->created_at,
            ],
            'roles' => $user->getRoleNames(),
            'permissions' => $user->getAllPermissions()->pluck('name'),
        ];

        return ApiResponse::success($data, 'User retrieved successfully');
    }

    public function assignRoles(Request $request, $userId)
    {
        $request->validate(['roles' => 'required|array']);
        $user = User::findOrFail($userId);
        $user->assignRole($request->roles);
        return ApiResponse::success($user->getRoleNames(), 'Roles assigned');
    }

    public function removeRole($userId, $roleId)
    {
        $user = User::findOrFail($userId);
        $role = \Spatie\Permission\Models\Role::findOrFail($roleId);
        $user->removeRole($role);
        return ApiResponse::success($user->getRoleNames(), 'Role removed');
    }
}
