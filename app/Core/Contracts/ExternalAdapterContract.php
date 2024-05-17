<?php

namespace App\Core\Contracts;

interface ExternalAdapterContract
{
  public function getExternalTodo(int $id);
}
