<?php

namespace App\Services;

use App\Repositories\RoleRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class RoleService
{
    protected $repo;

    public function __construct(RoleRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }

    public function filter($request)
    {
        $name       = $request->name;
        $sortBy     = $request->get('sort_by', 'name');
        $sortDir    = $request->get('sort_dir', 'asc');
        $perPage    = (int) $request->get('per_page', 10);
        $page       = (int) $request->get('page', 1);
        $offset     = ($page - 1) * $perPage;

        // Whitelist allowed fields
        $allowedSortBy = ['id', 'name', 'created_at', 'updated_at'];
        if (!in_array($sortBy, $allowedSortBy)) {
            $sortBy = 'name';
        }

        $allowedDir = ['asc', 'desc'];
        if (!in_array(strtolower($sortDir), $allowedDir)) {
            $sortDir = 'asc';
        }

        // Repository returns: [data, total]
        [$data, $total] = $this->repo->filter(
            $name,
            $sortBy,
            $sortDir,
            $perPage,
            $offset
        );

        // Convert models → array (agar paginator konsisten)
        $data = json_decode(json_encode($data), true);

        return new LengthAwarePaginator(
            $data,
            $total,
            $perPage,
            $page,
            [
                'path'  => $request->url(),
                'query' => $request->query(),
            ]
        );
    }


    public function findById($id)
    {
        return $this->repo->findById($id);
    }

    public function create($name)
    {
        return $this->repo->create($name);
    }

    public function update($id, $name)
    {
        return $this->repo->update($id, $name);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }

    public function attachPermissions($roleId, array $permissionIds)
    {
        return $this->repo->attachPermissions($roleId, $permissionIds);
    }

    public function detachPermission($roleId, $permissionId)
    {
        return $this->repo->detachPermission($roleId, $permissionId);
    }
}
