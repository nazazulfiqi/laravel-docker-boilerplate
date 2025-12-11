<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return ApiResponse::success(
            $this->service->getAll(),
            'Roles retrieved successfully'
        );
    }

    public function filter(Request $request)
    {
        return ApiResponse::paginated(
            $this->service->filter($request),
            'Filtered roles retrieved successfully'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles'
        ]);

        return ApiResponse::success(
            $this->service->create($request),
            'Role created successfully',
            201
        );
    }

    public function show($id)
    {
        return ApiResponse::success(
            $this->service->findById($id),
            'Role retrieved successfully'
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id
        ]);

        return ApiResponse::success(
            $this->service->update($request, $id),
            'Role updated successfully'
        );
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return ApiResponse::success(
            null,
            'Role deleted successfully'
        );
    }

    public function attachPermissions(Request $request, $roleId)
    {
        $request->validate([
            'permissions' => 'required|array'
        ]);

        return ApiResponse::success(
            $this->service->attachPermissions($request, $roleId),
            'Permissions attached'
        );
    }

    public function detachPermission($roleId, $permissionId)
    {
        $this->service->detachPermission($roleId, $permissionId);

        return ApiResponse::success(
            null,
            'Permission detached'
        );
    }
}
