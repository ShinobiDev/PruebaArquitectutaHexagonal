<?php

namespace App\Application\UseCases\Rol;

use App\Core\Repositories\RolRepository;

class CreateRolUseCase {
    private $rolRepository;

    public function __construct(RolRepository $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function execute($rol) {
        return $this->rolRepository->create($rol);
    }
}