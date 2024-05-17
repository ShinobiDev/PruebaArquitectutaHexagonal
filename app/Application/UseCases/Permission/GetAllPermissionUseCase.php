<?php

namespace App\Application\UseCases\Permission;

use App\Core\Repositories\PermissionRepository;

class GetAllPermissionUseCase {
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function execute() {
        return $this->permissionRepository->getAll();
    }
}