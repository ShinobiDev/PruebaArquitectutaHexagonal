<?php

namespace App\Infraestructure\Repositories;

use App\Core\Contracts\ExternalAdapterContract;
use App\Core\Entities\User;
use App\Core\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepository {
    private $externalService;

    public function __construct(ExternalAdapterContract $externalService) {
        $this->externalService = $externalService;
    }

    public function findById(int $id) {
        return $this->externalService->getExternalTodo($id);
        // return User::find($id);
    }

    public function getAll() {
        return User::all();
    }

    public function create($userData) {
        $user = new User([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => Hash::make($userData->password),
        ]);

        $user->save();

        return $user;
    }

    public function update($id, $userData) {
        $user = User::findOrFail($id);

        $user->name = $userData->name;
        $user->email = $userData->email;
        $user->password = Hash::make($userData->password);
        $user->save();

        return $user;
    }

    public function delete($id) {
        $user = User::findOrFail($id);

        $user->delete();
        return $user;
    }
}