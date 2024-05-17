<?php

namespace App\Application\UseCases\Rol;

use App\Core\Repositories\RolRepository;

class UpdateRolUseCase {
    private $rolRepository;

    public function __construct(RolRepository $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }

    public function execute($id, $rolData) {
        return $this->rolRepository->update($id, $rolData);
    }
}