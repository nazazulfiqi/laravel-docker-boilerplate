<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{
    // GET /permissions
    public function index()
    {
        $permissions = Permission::all();
        return ApiResponse::success($permissions, 'Permissions retrieved successfully');
    }

    public function filter(Request $request)
    {
        $query = Permission::query();

        if ($request->has('name') && $request->name !== null) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        $permissions = $query->orderBy('name')->get();

        return ApiResponse::success($permissions, 'Filtered permissions retrieved successfully');
    }


    // POST /permissions
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:permissions,name']);
        $permission = Permission::create(['name' => $request->name]);
        return ApiResponse::success($permission, 'Permission created');
    }

    // GET /permissions/{id}
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return ApiResponse::success(
            $permission,
            'Permission retrieved successfully'
        );
    }

    // PUT /permissions/{id}
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|unique:permissions,name,' . $id]);
        $permission = Permission::findOrFail($id);
        $permission->update(['name' => $request->name]);
        return ApiResponse::success($permission, 'Permission updated');
    }

    // DELETE /permissions/{id}
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return ApiResponse::success(null, 'Permission deleted');
    }
}
