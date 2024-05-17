<?php

namespace App\Http\Controllers;

use App\Application\UseCases\Permission\CreatePermissionUseCase;
use App\Application\UseCases\Permission\DeletePermissionUseCase;
use App\Application\UseCases\Permission\GetAllPermissionUseCase;
use App\Application\UseCases\Permission\GetPermissionByIdUseCase;
use App\Application\UseCases\Permission\UpdatePermissionUseCase;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllPermissionUseCase $useCase)
    {
        return $useCase->execute();
    }

    public function find(int $id, GetPermissionByIdUseCase $useCase) {
        $user = $useCase->execute($id);
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreatePermissionUseCase $useCase)
    {
        try {
            return $useCase->execute($request);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request, UpdatePermissionUseCase $useCase)
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
    public function destroy(int $id, DeletePermissionUseCase $useCase)
    {
        try {
            return $useCase->execute($id);
        } catch (\Throwable $th) {
            return response(["message" => 'Internal Server Error'], 500);
        }
    }
}
