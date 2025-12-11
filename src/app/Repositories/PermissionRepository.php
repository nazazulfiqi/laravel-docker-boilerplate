<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class PermissionRepository
{
    public function getAll()
    {
        return DB::select("SELECT * FROM permissions");
    }

    public function filter($name, $sortBy, $sortDir, $perPage, $offset)
    {
        $where = "WHERE 1=1";
        $params = [];

        if (!empty($name)) {
            $where .= " AND name LIKE ?";
            $params[] = "%{$name}%";
        }

        // Count total
        $total = DB::select("SELECT COUNT(*) AS total FROM permissions $where", $params)[0]->total;

        // Data list
        $data = DB::select("
            SELECT * FROM permissions
            $where
            ORDER BY $sortBy $sortDir
            LIMIT $perPage OFFSET $offset
        ", $params);

        return [$data, $total];
    }

    public function find($id)
    {
        $result = DB::select("SELECT * FROM permissions WHERE id = ?", [$id]);
        return $result[0] ?? null;
    }

    public function create($name)
    {
        DB::insert("INSERT INTO permissions (name, created_at, updated_at) VALUES (?, NOW(), NOW())", [$name]);

        return DB::select("SELECT * FROM permissions WHERE name = ?", [$name])[0];
    }

    public function update($id, $name)
    {
        DB::update("
            UPDATE permissions SET name = ?, updated_at = NOW()
            WHERE id = ?
        ", [$name, $id]);

        return $this->find($id);
    }

    public function delete($id)
    {
        return DB::delete("DELETE FROM permissions WHERE id = ?", [$id]);
    }
}
