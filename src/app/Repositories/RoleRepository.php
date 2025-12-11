<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function getAll()
    {
        return Role::all();
    }

    public function filter($name, $sortBy, $sortDir, $perPage, $offset)
    {
        $query = Role::query();

        if (!empty($name)) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }

        // Sorting
        $query->orderBy($sortBy, $sortDir);

        // Total count
        $total = $query->count();

        // Data result
        $data = $query->skip($offset)
            ->take($perPage)
            ->get();

        return [$data, $total];
    }

    public function findById($id)
    {
        return Role::findOrFail($id);
    }

    public function create($name)
    {
        return Role::create(['name' => $name]);
    }

    public function update($id, $name)
    {
        $role = Role::findOrFail($id);
        $role->update(['name' => $name]);
        return $role;
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        return $role->delete();
    }

    public function attachPermissions($roleId, array $permissionIds)
    {
        $role = Role::findOrFail($roleId);
        return $role->givePermissionTo($permissionIds);
    }

    public function detachPermission($roleId, $permissionId)
    {
        $role = Role::findOrFail($roleId);
        return $role->revokePermissionTo($permissionId);
    }
}
