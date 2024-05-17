<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Permission;
use App\Core\Repositories\PermissionRepository;

class EloquentPermissionRepository implements PermissionRepository {

    public function findById(int $id) {
        return Permission::find($id);
    }

    public function getAll() {
        return Permission::all();
    }

    public function create($permissionData) {
        $permission = new Permission([
            'name' => $permissionData->name,
            'description' => $permissionData->description,
            'active' => true
        ]);

        $permission->save();

        return $permission;
    }

    public function update($id, $permissionData) {
        $permission = Permission::findOrFail($id);

        $permission->name = $permissionData->name;
        $permission->description = $permissionData->description;
        $permission->active = $permissionData->active;
        $permission->save();

        return $permission;
    }

    public function delete($id) {
        $permission = Permission::findOrFail($id);

        $permission->delete();
        return $permission;
    }
}