<?php

namespace App\Infraestructure\Repositories;

use App\Core\Entities\Rol;
use App\Core\Repositories\RolRepository;

class EloquentRolRepository implements RolRepository {

    public function findById(int $id) {
        return Rol::find($id);
    }

    public function getAll() {
        return Rol::all();
    }

    public function create($rolData) {
        $rol = new Rol([
            'name' => $rolData->name,
        ]);

        $rol->active = true;
        $rol->save();

        return $rol;
    }

    public function update($id, $rolData) {
        $rol = Rol::findOrFail($id);

        $rol->name = $rolData->name;
        $rol->active = $rolData->active;
        $rol->save();

        return $rol;
    }

    public function delete($id) {
        $rol = Rol::findOrFail($id);

        $rol->delete();
        return $rol;
    }
}