<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Director;
use App\Http\Middleware\Provider;
use App\Http\Middleware\Patient;
use App\Http\Middleware\Prosec;
use App\Http\Middleware\Secretary;




return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'director'=>Director::class,
            'provider'=>Provider::class,
            'patient'=>Patient::class,
            'secretary'=>Secretary::class,
            'prosec'=>Prosec::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
