<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

/**
 * Class Handler
 * Custom exception handler for the application.
 */
class Handler extends ExceptionHandler
{
    protected $levels = [];

    protected $dontReport = [];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'message' => 'Errores de validación',
                'errors'  => $exception->errors()
            ], 422);
        }

        // Forzar siempre JSON si la solicitud lo espera
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'exception' => $exception->getMessage()
            ], 500);
        }

        // Si no espera JSON, usar el render normal (HTML)
        return parent::render($request, $exception);
    }
}
