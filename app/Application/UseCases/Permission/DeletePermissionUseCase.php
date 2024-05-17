<?php

namespace App\Application\UseCases\Permission;

use App\Core\Repositories\PermissionRepository;

class DeletePermissionUseCase {
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function execute($id) {
        return $this->permissionRepository->delete($id);
    }
}