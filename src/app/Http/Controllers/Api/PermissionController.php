<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Services\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $service;

    public function __construct(PermissionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $permissions = $this->service->getAll();
        return ApiResponse::success($permissions, 'Permissions retrieved successfully');
    }

    public function filter(Request $request)
    {
        $result = $this->service->filter($request);
        return ApiResponse::paginated($result, 'Filtered permissions retrieved successfully');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:permissions,name']);
        $permission = $this->service->create($request->name);

        return ApiResponse::success($permission, 'Permission created');
    }

    public function show($id)
    {
        $permission = $this->service->find($id);
        if (!$permission) return ApiResponse::error('Permission not found', 404);

        return ApiResponse::success($permission, 'Permission retrieved successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|unique:permissions,name,' . $id]);

        $permission = $this->service->update($id, $request->name);
        return ApiResponse::success($permission, 'Permission updated');
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) return ApiResponse::error('Permission not found', 404);

        return ApiResponse::success(null, 'Permission deleted');
    }
}
