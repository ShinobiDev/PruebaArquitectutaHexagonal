<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Rol\CreateRolUseCase;
use App\Application\UseCases\Rol\DeleteRolUseCase;
use App\Application\UseCases\Rol\GetAllRolUseCase;
use App\Application\UseCases\Rol\GetRolByIdUseCase;
use App\Application\UseCases\Rol\UpdateRolUseCase;
use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllRolUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetRolByIdUseCase $useCase) {
        $user = $useCase->execute($id);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateRolUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return $th;
            return response(["message" => 'Internal Server Error'], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request, UpdateRolUseCase $useCase)
    {
        try {
            return $useCase->execute($id, $request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, DeleteRolUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
