<?php

namespace App\Core\Repositories;

interface RolRepository {

    public function findById(int $id);
    public function getAll();
    public function create($rolData);
    public function update($id, $rolData);
    public function delete($id);

}