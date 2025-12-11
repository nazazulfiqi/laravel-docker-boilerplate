<?php

namespace App\Services;

use App\Repositories\PermissionRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class PermissionService
{
    protected $repo;

    public function __construct(PermissionRepository $repo)
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

        // Whitelist
        $allowedSortBy = ['id', 'name', 'created_at', 'updated_at'];
        if (!in_array($sortBy, $allowedSortBy)) {
            $sortBy = 'name';
        }

        $allowedDir = ['asc', 'desc'];
        if (!in_array(strtolower($sortDir), $allowedDir)) {
            $sortDir = 'asc';
        }

        [$data, $total] = $this->repo->filter($name, $sortBy, $sortDir, $perPage, $offset);

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

    public function find($id)
    {
        return $this->repo->find($id);
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
}
