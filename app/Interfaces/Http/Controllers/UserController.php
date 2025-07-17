<?php


namespace App\Interfaces\Http\Controllers;

use App\Application\User\UseCases\RegisterUserUseCase;
use App\Interfaces\Http\Requests\RegisterUserRequest as UserRequest;
use Illuminate\Http\Request;

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
    {
        throw new \Exception("Prueba de excepción personalizada");

        $this->registerUser->execute(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return response()->json(['message' => 'Usuario registrado correctamente.']);
    }
}
