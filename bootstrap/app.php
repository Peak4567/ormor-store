<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckMaintenanceMode;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        
        $middleware->web(append: [
            CheckMaintenanceMode::class,
        ]);

        $middleware->alias([
            'is_admin' => \App\Http\Middleware\CheckAdmin::class,
        ]);

        $middleware->redirectTo(
            guests: fn () => abort(404),
            
            users: fn () => abort(404)
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
    })->create();