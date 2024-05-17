<?php

namespace App\Infraestructure\Adapters;

use App\Core\Contracts\ExternalAdapterContract;
use App\Infraestructure\Services\ExternalService;

class ExternalServiceAdapter implements ExternalAdapterContract {
    
    private $externalService;

    public function __construct(ExternalService $externalService)
    {
        $this->externalService = $externalService;
        
    }

    public function getExternalTodo(int $id) {
        return $this->externalService->getExternalService($id);
    }
}