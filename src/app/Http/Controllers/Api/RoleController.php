<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * List all roles
     */
    public function index()
    {
        $roles = Role::all();

        return ApiResponse::success(
            $roles,
            'Roles retrieved successfully'
        );
    }

    /**
     * Create new role
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        return ApiResponse::success(
            $role,
            'Role created successfully',
            201
        );
    }

    /**
     * Show a single role
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return ApiResponse::success(
            $role,
            'Role retrieved successfully'
        );
    }

    /**
     * Update role
     */
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        return ApiResponse::success([
            'message' => 'Role updated successfully',
            'role' => $role,
        ]);
    }

    /**
     * Delete role
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return ApiResponse::success(
            null,
            'Role deleted successfully'
        );
    }

    public function attachPermissions(Request $request, $roleId)
    {
        $request->validate(['permissions' => 'required|array']);
        $role = Role::findOrFail($roleId);
        $role->givePermissionTo($request->permissions);
        return ApiResponse::success($role->permissions, 'Permissions attached');
    }

    public function detachPermission($roleId, $permissionId)
    {
        $role = Role::findOrFail($roleId);
        $permission = Permission::findOrFail($permissionId);
        $role->revokePermissionTo($permission);
        return ApiResponse::success(null, 'Permission detached');
    }
}
