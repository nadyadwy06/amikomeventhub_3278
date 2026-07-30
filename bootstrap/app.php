<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
    // 1. Pengecualian CSRF untuk Webhook Midtrans
        $middleware->validateCsrfTokens(except: [
            '/midtrans/callback',
        ]);
        
    // 2. Alias Middleware Admin Anda
    $middleware->alias([ 
 'admin' => \App\Http\Middleware\AdminMiddleware::class, //Sesuaikan dengan nama class middleware admin Anda 
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
