<?php


namespace App\Interfaces\Http\Controllers;

use App\Application\User\UseCases\RegisterUserUseCase;
use App\Interfaces\Http\Requests\RegisterUserRequest as UserRequest;
use Illuminate\Http\Request;
use App\Application\Shared\Exceptions\ApplicationException;
use Throwable;

class UserController
{
    public function __construct(private RegisterUserUseCase $registerUser) {}

    /**
     * Handle the incoming request to register a user.
     *
     * @param \App\Interfaces\Http\Requests\RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {   // Validación ya está manejada por el Form Request RegisterUserRequest
        try {
            // Validación ya está manejada por el Form Request RegisterUserRequest
            $this->registerUser->execute(
                $request->input('name'),
                $request->input('email'),
                $request->input('password')
            );
            // Respuesta exitosa
            return response()->json(['message' => 'Usuario registrado correctamente.'], 201);
        // Manejo de errores
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        // Manejo de otros tipos de errores
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error interno del servidor.'], 500);
        }
    }
}
