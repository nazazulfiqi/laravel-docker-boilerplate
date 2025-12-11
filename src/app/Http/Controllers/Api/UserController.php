<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserService $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $data = $this->users->getAllUsersWithRolesPermissions();
        return ApiResponse::success($data, 'Users retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->users->getUserDetail($id);
        return ApiResponse::success($data, 'User retrieved successfully');
    }

    public function assignRoles(Request $request, $userId)
    {
        $request->validate(['roles' => 'required|array']);
        $data = $this->users->assignRoles($userId, $request->roles);
        return ApiResponse::success($data, 'Roles assigned');
    }

    public function removeRole($userId, $roleId)
    {
        $data = $this->users->removeRole($userId, $roleId);
        return ApiResponse::success($data, 'Role removed');
    }
}
