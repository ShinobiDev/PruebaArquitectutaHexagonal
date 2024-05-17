<?php

namespace App\Application\UseCases\Permission;

use App\Core\Repositories\PermissionRepository;

class CreatePermissionUseCase {
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function execute($rol) {
        return $this->permissionRepository->create($rol);
    }
}