<?php

namespace App\Application\UseCases\Permission;

use App\Core\Repositories\PermissionRepository;

class GetPermissionByIdUseCase {
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function execute(int $id) {
        return $this->permissionRepository->findById($id);
    }
}