<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionRepository
{
    public function getAll()
    {
        return Permission::all();
    }

    public function filter($name, $sortBy, $sortDir, $perPage, $offset)
    {
        $query = Permission::query();

        if (!empty($name)) {
            $query->where('name', 'like', "%{$name}%");
        }

        // Total count
        $total = $query->count();

        // Data list
        $data = $query
            ->orderBy($sortBy, $sortDir)
            ->offset($offset)
            ->limit($perPage)
            ->get();

        return [$data, $total];
    }

    public function find($id)
    {
        return Permission::find($id);
    }

    public function create($name)
    {
        return Permission::create([
            'name' => $name,
            'guard_name' => 'web', // wajib, default spatie
        ]);
    }

    public function update($id, $name)
    {
        $permission = Permission::findOrFail($id);

        $permission->update([
            'name' => $name,
        ]);

        return $permission;
    }

    public function delete($id)
    {
        return Permission::destroy($id);
    }
}
