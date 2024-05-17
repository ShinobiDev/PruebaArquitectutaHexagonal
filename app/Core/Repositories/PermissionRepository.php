<?php

namespace App\Core\Repositories;

interface PermissionRepository {

    public function findById(int $id);
    public function getAll();
    public function create($permissionData);
    public function update($id, $permissionData);
    public function delete($id);

}