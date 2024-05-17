<?php

namespace App\Application\UseCases\Permission;

use App\Core\Repositories\PermissionRepository;

class UpdatePermissionUseCase {
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function execute($id, $rolData) {
        return $this->permissionRepository->update($id, $rolData);
    }
}