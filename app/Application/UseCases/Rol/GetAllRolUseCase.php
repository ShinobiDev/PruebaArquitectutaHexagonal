<?php

namespace App\Application\UseCases\Rol;

use App\Core\Repositories\RolRepository;

class GetAllRolUseCase {
    private $rolRepository;

    public function __construct(RolRepository $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function execute() {
        return $this->rolRepository->getAll();
    }
}