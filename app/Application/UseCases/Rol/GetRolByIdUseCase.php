<?php

namespace App\Application\UseCases\Rol;

use App\Core\Repositories\RolRepository;

class GetRolByIdUseCase {
    private $rolRepository;

    public function __construct(RolRepository $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function execute(int $id) {
        return $this->rolRepository->findById($id);
    }
}