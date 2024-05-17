<?php

namespace App\Application\UseCases\Rol;

use App\Core\Repositories\RolRepository;

class DeleteRolUseCase {
    private $rolRepository;

    public function __construct(RolRepository $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function execute($id) {
        return $this->rolRepository->delete($id);
    }
}